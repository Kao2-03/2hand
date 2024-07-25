@extends('layouts.app')

@section('content')
    {{-- ------------------ Home Content------------- --}}
    <section class = "home">
        {{-- Slider --}}
        <slider class = "home__slider-container">
            <div class="home__slider">
                <img src="{{ asset('images/wishlist-poster.jpg') }}" alt="Slider1" class = "home__slider-img">
                <div class="home__slider-content">
                    <h1 class = "home__slider-heading section-heading">Shopping and Substainable Fashion</h1>
                    <p class="home__slider-desc section-desc">Our fashion store is a unique blend of quality shopping and the excitement of consignment. Explore new styles every day and join us on a sustainable journey!</p>
                    <button class = "home__slider-btn btn"><a href="http://localhost:8000/products">Explore Products</a></button>
                </div>
            </div>
            <div class="home__slider">

            </div>
            <div class="home__slider">

            </div>
        </slider>

        {{-- Content --}}
        <div class="home__content-container container" id = "home_product">
            <p class="home__content-heading section-heading">Explore our catagories</p>
            <div class="home__btn-container">
                <button class="home__category-btn isChoose-btn">All category</button>
                <button class="home__category-btn">Men Product</button>
                <button class="home__category-btn">Women Product</button>
                <button class="home__category-btn">Accesories</button>
            </div>

            <div class="home__product-container">
                @forEach ($topProducts as $product)
                <div class="home__product-info">
                    <a href="#!"><img src="{{ asset($product->img) }}" alt="Product-img"
                            class = "home__product-img"></a>
                    <div class="home__product-subInfo">
                        <p class="category">{{ $product->category_name }}</p>
                        <img src="{{ asset('icons/heart-red.svg') }}" alt="" class="isLike">
                    </div>
                    <a href="#!" class = "home__product-name">{{ $product->cloth_name }}</a>
                    <p class="home__product-cost">{{ $product->cost }}</p>
                    <div class="home__star-container">
                        @php
                                    $rating = $product->avg_rate;
                                    $numStars = floor($rating); // Lấy phần nguyên của điểm đánh giá
                                    $partialStar = $rating - $numStars; // Lấy phần thập phân của điểm đánh giá
                                    $partialStar = $partialStar * 100;
                                @endphp
                        @for ($i = 0; $i < $numStars; $i++)
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star" style="clip-path: none">
                        @endfor
                        @if ($partialStar > 0)
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star" style="clip-path: polygon(0 0, {{ $partialStar }}% 0, {{ $partialStar }}% 100%, 0 100%)">
                        @else
                                    <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star"
                                        style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                @endif
                    </div>
                    <div style="display: inline">( <p class="home__rate-number" style="display: inline-block">{{ $product->total_reviews }}</p> )
                        reviews</div>
                    <button class="home__add-btn btn">Add to cart</button>
                </div>
                @endforeach
                {{-- <div class="home__product-info">
                    <a href="#!"><img src="{{ asset('images/product-item-2.png') }}" alt="Product-img"
                            class = "home__product-img"></a>
                    <div class="home__product-subInfo">
                        <p class="category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <a href="#!" class = "home__product-name">Mid Century Modern Shirt</a>
                    <p class="home__product-cost">$110</p>
                    <div class="home__star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__rate-number" style="display: inline-block">540</p> )
                        reviews</div>
                    <button class="home__add-btn btn">Add to cart</button>

                </div>
                <div class="home__product-info">
                    <a href="#!"><img src="{{ asset('images/product-item-4.png') }}" alt="Product-img"
                            class = "home__product-img"></a>
                    <div class="home__product-subInfo">
                        <p class="category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <a href="#!" class="home__product-name">Mid Century Modern Shirt</a>
                    <p class="home__product-cost">$110</p>
                    <div class="home__star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__rate-number" style="display: inline-block">540</p> )
                        reviews</div>
                    <button class="home__add-btn btn">Add to cart</button>
                </div> --}}
                <div class="arrow-left"><img src="{{ asset('icons/arrow-left.svg') }}" alt="" class = "toLeft">
                </div>
                <div class="arrow-right"><img src="{{ asset('icons/arrow-right.svg') }}" alt=""
                        class = "toRight"></div>

            </div>
            {{-- Cuối product-container --}}

            <div class="home__title">
                <p class="home__title-txt">New Products</p>
                <a href="{{ route('products.index') }}" class = "btn home__title-btn">View All</a>
            </div>

            <div class="home__new-product">
                {{-- <div class="home__new-product-info">
                    <img src="{{ asset('images/product-item-1.png') }}" alt="Product-img"
                        class = "home__new-product-img">
                    <div class="home__product-subInfo">
                        <p class="new-pr__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart-red.svg') }}" alt="" class="isLike">
                    </div>
                    <p class = "home__new-product-name">Mid Century Modern Shirt</p>
                    <p class="home__new-product-cost">$110</p>
                    <div class="home__new-pr-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__new-pr-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__new-pr-add-btn btn">Add to cart</button>
                </div>
                <div class="home__new-product-info">
                    <img src="{{ asset('images/product-item-5.png') }}" alt="Product-img"
                        class = "home__new-product-img">
                    <div class="home__product-subInfo">
                        <p class="new-pr__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <p class = "home__new-product-name">Mid Century Modern Shirt</p>
                    <p class="home__new-product-cost">$110</p>
                    <div class="home__new-pr-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__new-pr-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__new-pr-add-btn btn">Add to cart</button>
                </div>
                <div class="home__new-product-info">
                    <img src="{{ asset('images/product-item-6.png') }}" alt="Product-img"
                        class = "home__new-product-img">
                    <div class="home__product-subInfo">
                        <p class="new-pr__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <p class="home__new-product-name">Mid Century Modern Shirt</p>
                    <p class="home__new-product-cost">$110</p>
                    <div class="home__new-pr-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__new-pr-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__new-pr-add-btn btn">Add to cart</button>
                </div> --}}
                @forEach ($topnewProducts as $product)
                <div class="home__product-info">
                    <a href="#!"><img src="{{ asset($product->img) }}" alt="Product-img"
                            class = "home__product-img"></a>
                    <div class="home__product-subInfo">
                        <p class="category">{{ $product->category_name }}</p>
                        <img src="{{ asset('icons/heart-red.svg') }}" alt="" class="isLike">
                    </div>
                    <a href="#!" class = "home__product-name">{{ $product->cloth_name }}</a>
                    <p class="home__product-cost">{{ $product->cost }}</p>
                    <div class="home__star-container">
                        @php
                                    $rating = $product->avg_rate;
                                    $numStars = floor($rating); // Lấy phần nguyên của điểm đánh giá
                                    $partialStar = $rating - $numStars; // Lấy phần thập phân của điểm đánh giá
                                    $partialStar = $partialStar * 100;
                                @endphp
                        @for ($i = 0; $i < $numStars; $i++)
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star" style="clip-path: none">
                        @endfor
                        @if ($partialStar > 0)
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star" style="clip-path: polygon(0 0, {{ $partialStar }}% 0, {{ $partialStar }}% 100%, 0 100%)">
                        @else
                                    <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star"
                                        style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                @endif
                    </div>
                    <div style="display: inline">( <p class="home__rate-number" style="display: inline-block">{{ $product->total_reviews }}</p> )
                        reviews</div>
                    <button class="home__add-btn btn">Add to cart</button>
                </div>
                @endforeach
                <div class="arrow-left"><img src="{{ asset('icons/arrow-left.svg') }}" alt="" class = "toLeft">
                </div>
                <div class="arrow-right"><img src="{{ asset('icons/arrow-right.svg') }}" alt=""
                        class = "toRight"></div>

            </div>
            {{-- Cuối new-product --}}

            <div class="home__title">
                <p class="home__title-txt">Hurry, don't miss out on this offers</p>
                <button class = "btn home__title-btn">Browser All</button>
            </div>

            <div class="home__sale-product">
                <img src="{{ asset('images/sale-banner.png') }}" alt="" class="home__sale-banner">
                {{-- product1 --}}
                <div class="home__sale-product-info">
                    <img src="{{ asset('images/product-item-7.png') }}" alt="Product-img"
                        class = "home__sale-product-img">
                    <div class="home__product-subInfo">
                        <p class="sale__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <p class="home__sale-product-name">Mid Century Modern Shirt</p>
                    <p class="home__sale-product-cost">$110</p>
                    <p class="home__sale-product-new-cost">$110</p>
                    <br>
                    <div class="home__sale-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__sale-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__sale-add-btn btn">Add to cart</button>
                </div>
                {{-- product2 --}}
                <div class="home__sale-product-info">
                    <img src="{{ asset('images/product-item-5.png') }}" alt="Product-img"
                        class = "home__sale-product-img">
                    <div class="home__product-subInfo">
                        <p class="sale__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <p class="home__sale-product-name">Mid Century Modern Shirt</p>
                    <p class="home__sale-product-cost">$110</p>
                    <p class="home__sale-product-new-cost">$110</p>
                    <br>
                    <div class="home__sale-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__sale-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__sale-add-btn btn">Add to cart</button>
                </div>
                {{-- product3 --}}
                <div class="home__sale-product-info">
                    <img src="{{ asset('images/product-item-1.png') }}" alt="Product-img"
                        class = "home__sale-product-img">
                    <div class="home__product-subInfo">
                        <p class="sale__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <p class="home__sale-product-name">Mid Century Modern Shirt</p>
                    <p class="home__sale-product-cost">$110</p>
                    <p class="home__sale-product-new-cost">$110</p>
                    <br>
                    <div class="home__sale-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__sale-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__sale-add-btn btn">Add to cart</button>
                </div>
                {{-- product4 --}}
                <div class="home__sale-product-info">
                    <img src="{{ asset('images/product-item-6.png') }}" alt="Product-img"
                        class = "home__sale-product-img">
                    <div class="home__product-subInfo">
                        <p class="sale__category">Men-Cloths</p>
                        <img src="{{ asset('icons/heart.svg') }}" alt="" class="isLike">
                    </div>
                    <p class="home__sale-product-name">Mid Century Modern Shirt</p>
                    <p class="home__sale-product-cost">$110</p>
                    <p class="home__sale-product-new-cost">$110</p>
                    <br>
                    <div class="home__sale-star-container">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="home__star">
                    </div>
                    <div style="display: inline">( <p class="home__sale-rate-number" style="display: inline-block">540
                        </p> ) reviews</div>
                    <button class="home__sale-add-btn btn">Add to cart</button>
                </div>
                {{-- Cuối sale-product --}}
            </div>

            {{-- card --}}
            <div class="home__card-container">
                <div class="home__card">
                    <img src="{{ asset('icons/deli.svg') }}" alt="" class="home__card-icon">
                    <p class="home__card-description">Super Fast and Free Delivery</p>
                </div>
                <div class="home__card">
                    <img src="{{ asset('icons/deli.svg') }}" alt="" class="home__card-icon">
                    <p class="home__card-description">Money back Guaranteed</p>
                </div>
                <div class="home__card">
                    <img src="{{ asset('icons/deli.svg') }}" alt="" class="home__card-icon">
                    <p class="home__card-description">Super Secure Payment System</p>
                </div>
            </div>
            {{-- Cuối card --}}

            <div class="home__title">
                <p class="home__title-txt">Read our blogs</p>
                <a href="http://localhost:8000/blogs" class = "btn home__title-btn">Read all blogs</a>
            </div>
            {{-- Blog --}}
            <div class="home__blog-container">
                {{-- blog1 --}}
                <div class="home__blog">
                    <img src="{{ asset('images/blog1.png') }}" alt="" class="home__blog-img">
                    <p class="home__blog-day">April 30, 2020</p>
                    <p class="home__blog-title">How to collaborate with companies</p>
                    <p class="home__blog-txt">I will say this will be a game-changer for designers. They have a very
                        interesting idea of sorting resources (templates and blocks) with a huge collection of resources.
                        This will make the design work faster.</p>
                    <a href="" class="home__blog-readmore">READ MORE</a>
                </div>
                {{-- blog2 --}}
                <div class="home__blog">
                    <img src="{{ asset('images/blog2.png') }}" alt="" class="home__blog-img">
                    <p class="home__blog-day">April 30, 2020</p>
                    <p class="home__blog-title">How to collaborate with companies</p>
                    <p class="home__blog-txt">I will say this will be a game-changer for designers. They have a very
                        interesting idea of sorting resources (templates and blocks) with a huge collection of resources.
                        This will make the design work faster.</p>
                    <a href="" class="home__blog-readmore">READ MORE</a>
                </div>
            </div>
        </div>
        {{-- Cuối content-container --}}

        {{-- Subscribe --}}
        <div class="home__subscribe">
            <div class="home__subscribe-heading section-heading">Subscribe our newsletter to get latest product updates
            </div>
            <form action="" class = "home__subscribe-email">
                <input type="email" name="email" id="home__email" placeholder="Enter your email" required>
                <button type="submit" class = "btn home__subscribe-btn"> Subscribe</button>
            </form>
        </div>
    </section>
@endsection
