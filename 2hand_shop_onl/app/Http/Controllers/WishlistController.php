<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\Customer;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist_count = Wishlist::count();
        $wishlists = Wishlist::all();
        foreach ($wishlists as $wishlist) {
            $wishlist->cloth = Clothes::where('cloth_id', $wishlist->cloth_id)->first();
        }

        return view('wishlist.index', [
            'wishlists' => $wishlists,
            'wishlist_count' => $wishlist_count
        ]);
    }

    public function store(string $id)
    {
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $cloth = Clothes::where('cloth_id', $id)->first();
        $wishlist = Wishlist::create([
            'cloth_id' => $cloth->cloth_id,
            'cus_id' => $customer->cus_id
        ]);

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $wishlist = Wishlist::where('wishlist_id', $id)->delete();
        return redirect()->route('wishlist.index');
    }
}
