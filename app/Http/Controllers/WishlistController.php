<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = auth()->user()->wishlist;
        return view('wishlist.index', compact('wishlist'));
    }

    public function add($productId)
    {
        $product = \App\Models\Product::findOrFail($productId);
        $wishlist = auth()->user()->wishlist;

        $wishlist->items()->firstOrCreate([
            'product_id' => $productId,
        ]);

        return back()->with('success', 'Product added to wishlist.');
    }

    public function remove($productId)
    {
        $wishlist = auth()->user()->wishlist;
        $wishlist->items()->where('product_id', $productId)->delete();

        return back()->with('success', 'Product removed from wishlist.');
    }
}
