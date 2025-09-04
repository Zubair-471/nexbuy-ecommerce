<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartService
{
    /**
     * Get the user's cart.
     */
    public function getUserCart(): ?Cart
    {
        $user = Auth::user();
        return $user ? $user->cart : null;
    }

    /**
     * Add a product to the cart.
     */
    public function addToCart(int $productId, int $quantity): array
    {
        $product = Product::active()->findOrFail($productId);
        
        // Check stock availability
        if ($product->stock < $quantity) {
            return [
                'success' => false,
                'message' => 'Not enough stock available. Only ' . $product->stock . ' items in stock.'
            ];
        }

        $cart = $this->getUserCart();
        if (!$cart) {
            return [
                'success' => false,
                'message' => 'Cart not found.'
            ];
        }

        $cartItem = $cart->items()->where('product_id', $productId)->first();

        if ($cartItem) {
            // Update existing cart item
            $newQuantity = $cartItem->quantity + $quantity;
            
            if ($product->stock < $newQuantity) {
                return [
                    'success' => false,
                    'message' => 'Cannot add more items. Total quantity would exceed available stock.'
                ];
            }
            
            $cartItem->update(['quantity' => $newQuantity]);
            $message = 'Cart item quantity updated.';
        } else {
            // Create new cart item
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price_at_added' => $product->final_price,
            ]);
            $message = 'Item added to cart successfully.';
        }

        return [
            'success' => true,
            'message' => $message
        ];
    }

    /**
     * Update a cart item.
     */
    public function updateCartItem(int $itemId, int $quantity): array
    {
        $cart = $this->getUserCart();
        if (!$cart) {
            return [
                'success' => false,
                'message' => 'Cart not found.'
            ];
        }

        $cartItem = $cart->items()->with('product')->findOrFail($itemId);
        $product = $cartItem->product;
        
        if ($product->stock < $quantity) {
            return [
                'success' => false,
                'message' => 'Not enough stock available. Only ' . $product->stock . ' items in stock.'
            ];
        }

        $cartItem->update(['quantity' => $quantity]);

        return [
            'success' => true,
            'message' => 'Cart updated successfully.'
        ];
    }

    /**
     * Remove an item from the cart.
     */
    public function removeFromCart(int $itemId): array
    {
        $cart = $this->getUserCart();
        if (!$cart) {
            return [
                'success' => false,
                'message' => 'Cart not found.'
            ];
        }

        $cartItem = $cart->items()->findOrFail($itemId);
        $cartItem->delete();

        return [
            'success' => true,
            'message' => 'Item removed from cart successfully.'
        ];
    }

    /**
     * Get cart summary.
     */
    public function getCartSummary(): array
    {
        $cart = $this->getUserCart();
        if (!$cart) {
            return [
                'total_items' => 0,
                'total_amount' => 0,
                'item_count' => 0
            ];
        }

        $cart->load(['items.product']);
        
        $totalItems = $cart->items->sum('quantity');
        $totalAmount = $cart->items->sum(function ($item) {
            return $item->quantity * $item->price_at_added;
        });

        return [
            'total_items' => $totalItems,
            'total_amount' => $totalAmount,
            'item_count' => $cart->items->count()
        ];
    }

    /**
     * Clear the cart.
     */
    public function clearCart(): array
    {
        $cart = $this->getUserCart();
        if (!$cart) {
            return [
                'success' => false,
                'message' => 'Cart not found.'
            ];
        }

        $cart->items()->delete();

        return [
            'success' => true,
            'message' => 'Cart cleared successfully.'
        ];
    }
}
