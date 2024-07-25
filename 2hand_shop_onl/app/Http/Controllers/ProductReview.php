<?php

namespace App\Http\Controllers;
use App\Models\review;
use Illuminate\Http\Request;
use App\Models\clothes;
use Illuminate\Support\Facades\Auth;
use App\Models\customer;
use Illuminate\Support\Facades\DB;
class ProductReview extends Controller
{
    public function store(Request $request,string $id)
    {
        // Validate input
        
        $user = Auth::user();
        $customer = customer::where('user_id', $user->id)->first();
        $cloth = Clothes::where('cloth_id', $id)->first();
        $existingReview = Review::where('cus_id', $customer->cus_id)
            ->where('cloth_id', $id)
            ->first();
        if (!$existingReview) {
            $request->validate([
                'rate' => 'required|integer|between:1,5',
                'comment' => 'nullable|string',
            ]);
        Review::create([
            'cus_id' => $customer->cus_id,
            'cloth_id' => $cloth->cloth_id,
            'rate' => $request->rate,
            'comment' => $request->comment, 
        ]);
        $averageRating = DB::table('reviews')
        ->where('cloth_id', $id)
        ->avg('rate');
        $countRating = DB::table('reviews')
        ->where('cloth_id', $id)
        ->count('rate');
        $roundedAverageRating = round($averageRating, 1);
        DB::table('clothes')->where('cloth_id', $id)->update([
            'avg_rate' => $roundedAverageRating,
        ]);

        return response()->json(['success' => true]);
        } else {
        return response()->json(['error' => 'Bạn đã đánh giá sản phẩm này rồi.']);
        }
    }
}
