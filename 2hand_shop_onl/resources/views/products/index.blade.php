@extends('layouts.app')

@section('content')
    <section class="product">
        <div class="container">
            <h2 class="section-heading product__heading">
                Find something you love
            </h2>
            <div class="product__inner">
                <div class="product__filter">
                    <div class="product__filter-item">
                        <p class="section-title product__filter-item__title">
                            Catagories
                        </p>
                        <form action="{{ route('products.index') }}" method="GET">
                            <button class="section-desc product__filter-item__cate">All</button>
                        </form>
                        <div class="product-separate"></div>
                        @foreach ($categories as $category)
                            <form action="{{ route('products.filter-category', $category->category_id) }}" method="GET">
                                <button type="submit" class="section-desc product__filter-item__cate">
                                    {{ $category->name }}
                                </button>
                                <div class="product-separate"></div>
                            </form>
                        @endforeach
                    </div>
                </div>
                <div class="product__list">
                    @foreach ($clothes as $cloth)
                        <article class="product-item">
                            <div class="product-item__thumb-wrap">
                                <a href="{{ route('products.show', $cloth->cloth_id) }}">
                                    <img src="{{ asset($cloth->img->img) }}" alt="Lỗi"
                                    class="product-item__thumb">
                                </a>
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cloth_id" value="{{ $cloth->cloth_id }}">
                                    <button type="submit" class="product-item__add" onclick="openPopup()"
                                        data-product-id="{{ $cloth->id }}">Add to cart</button>
                                </form>
                            </div>

                            <div class="product-item__row">
                                <p class="product-item__category">{{ $cloth->cloth_id }}</p>
                                <form action="{{ route('wishlist.store', $cloth->cloth_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="like-btn">
                                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="like-btn__icon">
                                        <img src="{{ asset('icons/heart-red.svg') }}" alt=""
                                            class="like-btn__icon--liked">
                                    </button>
                                </form>
                            </div>
                            <a href="{{ route('products.show', $cloth->cloth_id) }}">
                                <h5 class="section-desc product-item__title">{{ $cloth->cloth_name }}</h5>
                            </a>
                            <p class="product-item__price">{{ $cloth->cost }} VNĐ</p>
                            <div class="product-item__rate">
                                @php
                                    $rating = $cloth->avg_rate;
                                    $numStars = floor($rating); // Lấy phần nguyên của điểm đánh giá
                                    $partialStar = $rating - $numStars; // Lấy phần thập phân của điểm đánh giá
                                    $partialStar = $partialStar * 100;
                                @endphp
                                @for ($i = 0; $i < $numStars; $i++)
                                    <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star"
                                        style="clip-path: none">
                                @endfor
                                @if ($partialStar > 0)
                                    <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star"
                                        style="clip-path: polygon(0 0, {{ $partialStar }}% 0, {{ $partialStar }}% 100%, 0 100%)">
                                @else
                                    <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star"
                                        style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                @endif
                                <span class="product-item__review">({{ $cloth->total_reviews }} reviews)</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- <button class="btn product__load">Load More</button> --}}
        </div>
        <!-- Thêm biểu tượng dấu tick vào popup-content -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <svg class="tick-icon" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>
                <p>Sản phẩm đã được thêm vào giỏ hàng thành công!</p>
            </div>
        </div>

        <script>
             function openPopup() {
                document.getElementById('popup').style.display = 'block';
            }

            function closePopup() {
                document.getElementById('popup').style.display = 'none';
            }
            
        </script>
    </section>
@endsection
