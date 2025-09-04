<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $product = \App\Models\Product::findOrFail($request->product_id);

        // Check if user already reviewed this product
        $existingReview = \App\Models\Review::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingReview) {
            return back()->withErrors(['review' => 'You have already reviewed this product.']);
        }

        \App\Models\Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'is_approved' => true, // Auto-approve for now
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = \App\Models\Review::where('user_id', auth()->id())
            ->findOrFail($id);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = \App\Models\Review::where('user_id', auth()->id())
            ->findOrFail($id);

        $review->delete();

        return back()->with('success', 'Review deleted successfully.');
    }
}
