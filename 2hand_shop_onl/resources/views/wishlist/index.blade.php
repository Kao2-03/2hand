@extends('layouts.app')

@section('content')
    <section class="wishlist">
        <div class="wishlist__header">
            <h1 class="wishlist__title">Wish List</h1>
            <h2 class="wishlist__subtitle">{{ $wishlist_count }} items in your wishlist</h2>
        </div>

        <div class="wishlist__content">
            <ul class="wishlist__list">
                <li class="wishlist__item wishlist__header-list">
                    <h3 class="wishlist__column-title"></h3>
                    <h3 class="wishlist__column-title">Product</h3>
                    <h3 class="wishlist__column-title"></h3>
                    <h3 class="wishlist__column-title">Price</h3>
                    <h3 class="wishlist__column-title">Brand</h3>
                    <h3 class="wishlist__column-title"></h3>
                </li>
                @foreach ($wishlists as $wishlist)
                    <li class="wishlist__item">
                        <form action="{{ route('wishlist.delete', $wishlist->wishlist_id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="wishlist__product-delete">
                                <img src="{{ asset('icons/X-Mark.svg') }}" alt="" class="product-delete__icon">
                            </button>
                        </form>

                        <img src="{{ asset('images/product-wishlist1.png') }}" alt="" class="wishlist__product-img">
                        <h3 class="wishlist__product-title">{{ $wishlist->cloth->cloth_name }}</h3>
                        <div class="wishlist__product-price">
                            <p class="wishlist__product-price-value">${{ $wishlist->cloth->cost }}</p>
                        </div>
                        <div class="wishlist__product-stock">
                            <p class="wishlist__product-stock-status">{{ $wishlist->cloth->brand }}</p>
                        </div>
                        <div>
                            <button class="btn wishlist__add-to-cart">Add to Cart</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
