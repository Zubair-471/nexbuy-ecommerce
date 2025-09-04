<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends AdminController
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        try {
            $stats = $this->getStats();
            $recentOrders = $this->getRecentOrders();
            $recentProducts = $this->getRecentProducts();
            $lowStockProducts = $this->getLowStockProducts();
            $monthlyRevenue = $this->getMonthlyRevenue();
            $topProducts = $this->getTopSellingProducts();
            $recentActivity = $this->getRecentActivity();

            return view('admin.dashboard', compact(
                'stats',
                'recentOrders',
                'recentProducts',
                'lowStockProducts',
                'monthlyRevenue',
                'topProducts',
                'recentActivity'
            ));
        } catch (\Exception $e) {
            return $this->redirectError('admin.dashboard', 'Error loading dashboard: ' . $e->getMessage());
        }
    }

    /**
     * Get recent orders with eager loading.
     */
    private function getRecentOrders()
    {
        return Order::with(['user:id,name,email', 'items.product:id,name,price'])
            ->latest()
            ->take(5)
            ->get();
    }

    /**
     * Get recent products with eager loading.
     */
    private function getRecentProducts()
    {
        return Product::with(['category:id,name', 'images:id,product_id,path,sort_order'])
            ->latest()
            ->take(5)
            ->get();
    }

    /**
     * Get low stock products.
     */
    private function getLowStockProducts()
    {
        return Product::with(['category:id,name'])
            ->where('stock', '<', 10)
            ->orderBy('stock', 'asc')
            ->take(5)
            ->get();
    }

    /**
     * Get monthly revenue data for the last 12 months.
     */
    private function getMonthlyRevenue()
    {
        $monthlyData = collect();
        
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            
            $monthlyRevenue = Order::where('status', 'completed')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->sum('total_amount');
                
            $monthlyData->push([
                'month' => $date->format('M'),
                'revenue' => $monthlyRevenue
            ]);
        }
        
        return $monthlyData;
    }

    /**
     * Get top selling products with optimized query.
     */
    private function getTopSellingProducts()
    {
        return Product::with(['category:id,name'])
            ->withCount(['orderItems as total_sold' => function($query) {
                $query->whereHas('order', function($q) {
                    $q->where('status', 'completed');
                });
            }])
            ->orderBy('total_sold', 'desc')
            ->take(5)
            ->get();
    }

    /**
     * Get recent activity across the system.
     */
    private function getRecentActivity()
    {
        $activities = collect();

        // Recent orders
        $recentOrders = Order::with('user:id,name')
            ->latest()
            ->take(3)
            ->get()
            ->map(function($order) {
                return (object) [
                    'description' => "New order #{$order->order_number} from {$order->user->name}",
                    'created_at' => $order->created_at,
                    'type' => 'order'
                ];
            });

        // Recent products
        $recentProducts = Product::latest()
            ->take(3)
            ->get()
            ->map(function($product) {
                return (object) [
                    'description' => "New product '{$product->name}' added",
                    'created_at' => $product->created_at,
                    'type' => 'product'
                ];
            });

        // Recent users
        $recentUsers = User::latest()
            ->take(3)
            ->get()
            ->map(function($user) {
                return (object) [
                    'description' => "New user {$user->name} registered",
                    'created_at' => $user->created_at,
                    'type' => 'user'
                ];
            });

        // Combine and sort by creation date
        $activities = $recentOrders->concat($recentProducts)->concat($recentUsers)
            ->sortByDesc('created_at')
            ->take(6);

        return $activities;
    }
}
