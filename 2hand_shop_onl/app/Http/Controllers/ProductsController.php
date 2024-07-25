<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Cloth_img;
use App\Models\Clothes;
use App\Models\List_clothes;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function index()
    {
        $clothes = Clothes::all();
        $categories = Category::all();
        $countRating = DB::table('reviews')
            ->groupBy('cloth_id')
            ->select('cloth_id', DB::raw('count(*) as total_reviews'))
            ->get();
        $countRatingArray = $countRating->pluck('total_reviews', 'cloth_id')->toArray();

        // Add the total_reviews property to each Clothes model
        foreach ($clothes as $cloth) {
            $cloth->total_reviews = $countRatingArray[$cloth->cloth_id] ?? 0;
        }

        foreach($clothes as $cloth) {
            $cloth_img = Cloth_img::where('cloth_id', $cloth->cloth_id)->first();
            $cloth->img = $cloth_img;
        }

        return view('products.index', [
            'clothes' => $clothes,
            'categories' => $categories
        ]);
    }

    public function show(string $id)
    {
        $countRating = DB::table('reviews')
            ->where('cloth_id', $id)
            ->count('rate');
        $cloth = Clothes::where('cloth_id', $id)->first();
        $reviews = DB::table('reviews')
            ->where('cloth_id', $id);
        $customers = DB::select('SELECT * FROM reviews r,customers c WHERE r.cus_id = c.cus_id;');
        $reviewsAndCustomers = Review::join('customers', 'reviews.cus_id', '=', 'customers.cus_id')
            ->join('users', 'customers.user_id', '=', 'users.id')
            ->select('reviews.*', 'users.name as customer_name', 'customers.avatar as customer_avatar')
            ->get();
        foreach ($reviewsAndCustomers as $item) {
            // Replace spaces and hyphens with a format Carbon can parse
            $formattedCreatedAt = str_replace([' - ', ' '], ['-', 'T'], $item->created_at);

            // Chuyển đổi created_at thành chuỗi định dạng "Y-m-d\TH:i"
            $formattedCreatedAt = Carbon::parse($formattedCreatedAt)->format('Y-m-d\TH:i');

            // Gán giá trị mới vào thuộc tính created_at
            $item->created_at = $formattedCreatedAt;
        }
        $category = Category::where('category_id', $cloth->category_id)->first();
        $cloth->category = $category;

        $cloth_img = Cloth_img::where('cloth_id', $cloth->cloth_id)->first();
        $cloth->img = $cloth_img;

        $list_size = List_clothes::where('cloth_id', $id)->get();

        $user = Auth::user();
        // dd($user);

        $customer = customer::where('user_id', $user->id)->first();
        $existingReview = Review::where('cus_id', $customer->cus_id)
            ->where('cloth_id', $id)
            ->first();
        return view('products.show', [
            'cloth' => $cloth,
            'list_size' => $list_size,
            'countRating' => $countRating,
            'reviewsAndCustomers' => $reviewsAndCustomers,
            'existingReview' => $existingReview,
        ]);
    }

    public function filterWithCategory(string $id)
    {
        $categories = Category::all();
        $category = Category::where('category_id', $id)->first();
        $clothes = Clothes::where('category_id', $category->category_id)->get();

        foreach($clothes as $cloth) {
            $cloth_img = Cloth_img::where('cloth_id', $cloth->cloth_id)->first();
            $cloth->img = $cloth_img;
        }

        return view('products.index', [
            'clothes' => $clothes,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('searchKey');
        $searchResults = Clothes::where('cloth_name', 'like', '%' . $search . '%')->get();

        // Chuyển kết quả tìm kiếm đến view
        return view('products.search', compact('searchResults', 'search'));
    }
}
