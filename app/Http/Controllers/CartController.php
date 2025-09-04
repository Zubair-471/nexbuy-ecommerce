<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Coupon;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Display the user's cart.
     */
    public function index()
    {
        $cart = $this->cartService->getUserCart();
        
        if (!$cart) {
            return view('cart.index', compact('cart'));
        }

        // Load cart items with products
        $cart->load(['items.product.category', 'items.product.images']);
        
        return view('cart.index', compact('cart'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(CartItemRequest $request, $productId)
    {
        $result = $this->cartService->addToCart($productId, $request->quantity);
        
        if ($result['success']) {
            return $this->success($result['message']);
        }
        
        return $this->error($result['message']);
    }

    /**
     * Update a cart item.
     */
    public function update(CartItemRequest $request, $itemId)
    {
        $result = $this->cartService->updateCartItem($itemId, $request->quantity);
        
        if ($result['success']) {
            return $this->success($result['message']);
        }
        
        return $this->error($result['message']);
    }

    /**
     * Remove an item from the cart.
     */
    public function remove($itemId)
    {
        $result = $this->cartService->removeFromCart($itemId);
        
        if ($result['success']) {
            return $this->success($result['message']);
        }
        
        return $this->error($result['message']);
    }

    /**
     * Apply a coupon to the cart.
     */
    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50',
        ]);

        $coupon = Coupon::where('code', $request->code)
            ->where('status', 'active')
            ->first();

        if (!$coupon) {
            return $this->error('Invalid coupon code.');
        }

        if (!$coupon->isValid()) {
            return $this->error('Coupon has expired or is not yet active.');
        }

        // Check if coupon can be applied to current cart
        $cart = $this->cartService->getUserCart();
        if ($cart) {
            $summary = $this->cartService->getCartSummary();
            if ($summary['total_amount'] < $coupon->minimum_amount) {
                return $this->error('Minimum order amount of $' . $coupon->minimum_amount . ' required for this coupon.');
            }
        }

        session(['applied_coupon' => $coupon->id]);

        return $this->success('Coupon applied successfully. You saved $' . $coupon->discount_amount);
    }
}
