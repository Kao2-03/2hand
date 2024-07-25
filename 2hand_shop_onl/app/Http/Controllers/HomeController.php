<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topProducts = DB::table('clothes')
        ->leftJoin('categories', 'clothes.category_id', '=', 'categories.category_id')
        ->leftJoin('cloth_imgs', 'clothes.cloth_id', '=', 'cloth_imgs.cloth_id')
        ->select('clothes.cloth_name as cloth_name', 'categories.name as category_name', 'cloth_imgs.img','clothes.avg_rate','clothes.cost','clothes.cloth_id')
        ->orderBy('clothes.purchase_quantity', 'desc') // Sắp xếp theo thời gian tạo giảm dần
        ->take(3) // Lấy top 3 sản phẩm
        ->get();
        $countRating = DB::table('clothes')
        ->leftJoin('reviews', 'clothes.cloth_id', '=', 'reviews.cloth_id')
        ->groupBy('clothes.cloth_id')
        ->select('clothes.cloth_id', DB::raw('count(*) as total_reviews'))
        ->orderByDesc('purchase_quantity') // Order by total_purchases in descending order
        ->limit(3) // Limit the results to 3
        ->get();
        $countRatingArray = $countRating->pluck('total_reviews', 'cloth_id')->toArray();

// Assuming $topProducts is already defined somewhere in your code
foreach ($topProducts as $cloth) {
    $cloth->total_reviews = $countRatingArray[$cloth->cloth_id] ?? 0;
}
$topnewProducts = DB::table('clothes')
->leftJoin('categories', 'clothes.category_id', '=', 'categories.category_id')
->leftJoin('cloth_imgs', 'clothes.cloth_id', '=', 'cloth_imgs.cloth_id')
->select('clothes.cloth_name as cloth_name', 'categories.name as category_name', 'cloth_imgs.img','clothes.avg_rate','clothes.cost','clothes.cloth_id')
->orderBy('clothes.created_at', 'desc') // Sắp xếp theo thời gian tạo giảm dần
->take(3) // Lấy top 3 sản phẩm
->get();
$countRating = DB::table('clothes')
->leftJoin('reviews', 'clothes.cloth_id', '=', 'reviews.cloth_id')
->groupBy('clothes.cloth_id')
->select('clothes.cloth_id', DB::raw('count(*) as total_reviews'))
->orderByDesc('clothes.created_at') // Order by total_purchases in descending order
->limit(3) // Limit the results to 3
->get();
$countRatingArray = $countRating->pluck('total_reviews', 'cloth_id')->toArray();

// Assuming $topProducts is already defined somewhere in your code
foreach ($topnewProducts as $cloth) {
    $cloth->total_reviews = $countRatingArray[$cloth->cloth_id] ?? 0;
}
        return view('home',['topProducts'=>$topProducts,'topnewProducts'=>$topnewProducts]);
    }
}
