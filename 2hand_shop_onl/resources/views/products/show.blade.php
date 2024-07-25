@extends('layouts.app')

@section('content')
    {{-- Product detail --}}
    <section class="product-detail">
        <div class="container">
            {{-- Product detail view --}}
            <div class="product-detail__view">
                <div class="product-detail__img-wrap">
                    <img src="{{ asset($cloth->img->img) }}" alt="" class="product-detail__img">
                    {{-- <div class="product-detail__thumb-wrap">
                        <img src="{{ asset($cloth->img->img) }}" alt="" class="product-detail__thumb">
                    </div> --}}
                </div>
                <div class="product-detail__content">
                    <h1 class="product-detail__content-heading">{{ $cloth->cloth_name }}</h1>
                    <p class="section-title product-detail__price">{{ $cloth->category->name }}</p>
                    @foreach ($list_size as $size)
                        <a href="#!" class="section-title product-detail__price" style="margin-right: 20px">
                            {{ $size->size_id }}
                        </a>
                    @endforeach
                    <div class="product-detail__rate">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-detail__star"
                            style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-detail__star"
                            style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-detail__star"
                            style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-detail__star "
                            style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-detail__star"
                            style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                        <span class="product-detail__qnt">{{ $cloth->avg_rate }} ({{ $countRating }})</span>
                    </div>
                    <p class="section-title product-detail__price">${{ $cloth->cost }}</p>
                    <div class="product-detail__num-wrap">
                        <div class="product-detail__num">
                            <button class="num__btn">
                                <img src="{{ asset('icons/subtract.svg') }}" alt="">
                            </button>
                            <input class="num__value" type="number" value="1" name="" id="">
                            <button class="num__btn">
                                <img src="{{ asset('icons/add.svg') }}" alt="">
                            </button>
                        </div>
                        <span class="product-detail__available">{{ $cloth->stock }} sản phẩm có sẵn</span>
                    </div>
                    <form action="{{ route('cart.addDetail') }}" method="post" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="cloth_id" value="{{ $cloth->cloth_id }}">
                        <input type="hidden" name="quantity" id="quantity">
                        <button type="submit" class="btn product-detail__btn-add" onclick="openPopup()">Thêm vào giỏ</button>
                    </form>
                    <button class="btn product-detail__btn-checkout">Mua hàng</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Product description --}}
    <section class="product-about">
        <div class="container">
            <div class="product-about__inner">
                <h4 class="section-title product-about__heading">About this product</h4>
                <p class="section-desc product-about__desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Culpa laborum quasi hic dolores soluta, doloribus animi nulla</p>
                <ul class="product-list__desc">
                    <li class="section-desc product-item__desc">Lorem ipsum dolor sit amet consectetur</li>
                    <li class="section-desc product-item__desc">Lorem ipsum dolor sit amet consectetur</li>
                    <li class="section-desc product-item__desc">Lorem ipsum dolor sit amet consectetur</li>
                </ul>
                <p class="section-desc product-about__note">
                    <strong class="note">Note:</strong> Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Culpa laborum quasi hic dolores soluta, doloribus animi nulla
                </p>
            </div>
        </div>
    </section>

    {{-- Product rating & feedback --}}
    <section class="product-rating-feedback">
        <div class="container">
            <div class="product-row">
                {{-- Product rating --}}
                <div class="product-rating">
                    <h4 class="section-title product-rating__header">Đánh giá sản phẩm</h4>
                    <div class="product-rating-overview">
                        <div class="product-rating-overview__score-wrap">
                            <span class="section-title product-rating-overview__rating-score">
                                <strong class="product-rating-overview__rating-score-decor">
                                    {{ $cloth->avg_rate }}
                                </strong> trên 5
                            </span>
                            <div class="product-rating-overview__stars">
                                <img src="{{ asset('icons/star.svg') }}" alt=""
                                    class="product-rating-overview__star"
                                    style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                <img src="{{ asset('icons/star.svg') }}" alt=""
                                    class="product-rating-overview__star"
                                    style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                <img src="{{ asset('icons/star.svg') }}" alt=""
                                    class="product-rating-overview__star"
                                    style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                <img src="{{ asset('icons/star.svg') }}" alt=""
                                    class="product-rating-overview__star"
                                    style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                <img src="{{ asset('icons/star.svg') }}" alt=""
                                    class="product-rating-overview__star"
                                    style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                            </div>
                        </div>
                        <div class="product-rating-overview__filters">
                            <button class="product-rating-overview__filter product-rating-overview__filter--active">
                                Tất cả
                            </button>
                            <button class="product-rating-overview__filter">5 sao (123)</button>
                            <button class="product-rating-overview__filter">4 sao (89)</button>
                            <button class="product-rating-overview__filter">3 sao (40)</button>
                            <button class="product-rating-overview__filter">2 sao (14)</button>
                            <button class="product-rating-overview__filter">1 sao (5)</button>
                        </div>
                    </div>
                </div>

                {{-- Product feedback --}}
                <div class="product-feedback">
                    <h4 class="section-title product-feedback__header">How would you rate this?</h4>
                    <div class="product-feedback-rating">
                        <img src="{{ asset('icons/star-regular.svg') }}" alt=""
                            class="product-feedback-rating__star" onclick="rateProduct(1)">
                        <img src="{{ asset('icons/star-regular.svg') }}" alt=""
                            class="product-feedback-rating__star" onclick="rateProduct(2)">
                        <img src="{{ asset('icons/star-regular.svg') }}" alt=""
                            class="product-feedback-rating__star" onclick="rateProduct(3)">
                        <img src="{{ asset('icons/star-regular.svg') }}" alt=""
                            class="product-feedback-rating__star" onclick="rateProduct(4)">
                        <img src="{{ asset('icons/star-regular.svg') }}" alt=""
                            class="product-feedback-rating__star" onclick="rateProduct(5)">
                    </div>
                    <p class="section-title product-feedback__title">
                        Viết đánh giá sản phẩm
                    </p>
                    <textarea class="product-feedback__comment" name="" id="" cols="61" rows="12"
                        placeholder="Ghi ra đánh giá sản phẩm..."></textarea>
                    @if ($existingReview)
                        <p class="section-title product-feedback__title">
                            Bạn đã đánh giá sản phẩm!
                        </p>
                    @else
                        <button class="btn product-feedback__submit">Gửi đánh giá</button>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Customer feedback --}}
    <section class="feedback">
        <div class="container">
            <div class="feedback__inner">
                {{-- Feedback item 1 --}}
                @foreach ($reviewsAndCustomers as $reviewsAndCustomer)
                    <div class="feedback-item">
                        <div class="section-desc feedback-item__header">
                            <img src=" {{ asset($reviewsAndCustomer->customer_avt) }}" alt=""
                                class="feedback-item__img">
                            <div class="feedback-item__header-wrap">
                                <p class="feedback-item__name">
                                    {{ $reviewsAndCustomer->customer_name }}
                                </p>
                                <div class="feedback-item__stars">

                                    @for ($i = 0; $i < $reviewsAndCustomer->rate; $i++)
                                        <img src="{{ asset('icons/star.svg') }}" alt=""
                                            class="feedback-item__star" style="clip-path: none">
                                    @endfor

                                    @for ($i = 0; $i < 5 - $reviewsAndCustomer->rate; $i++)
                                        <img src="{{ asset('icons/star.svg') }}" alt=""
                                            class="feedback-item__star"
                                            style="clip-path: polygon(0 0, 0 0, 0 100%, 0 100%)">
                                    @endfor
                                </div>
                                <p class="feedback-item__time">{{ $reviewsAndCustomer->created_at }}</p>
                            </div>
                        </div>
                        <p class="feedback-item__desc">
                            {{ $reviewsAndCustomer->comment }}
                        </p>
                    </div>
                @endforeach
            </div>
            <button class="btn feedback-item__btn">Load more</button>
        </div>
    </section>

    {{-- Similar products --}}
    <section class="similar">
        <div class="container">
            <div class="similar-row">
                <p class="section-heading similar__heading">
                    Sản phẩm tương tự
                </p>
                <button class="btn similar__btn">Browse All</button>
            </div>
            <div class="similar__list">
                {{-- Similar product 1 --}}
                <article class="product-item similar-product-item">
                    <div class="product-item__thumb-wrap">
                        <a href="#!">
                            <img src="{{ asset('images/product-item-1.png') }}" alt=""
                                class="product-item__thumb similar-item__thumb">
                        </a>
                        <button class="product-item__add similar-item__btn">Add to cart</button>
                    </div>

                    <div class="product-item__row">
                        <p class="product-item__category">Men-Cloths</p>
                        <button class="like-btn">
                            <img src="{{ asset('icons/heart.svg') }}" alt="" class="like-btn__icon">
                            <img src="{{ asset('icons/heart-red.svg') }}" alt="" class="like-btn__icon--liked">
                        </button>
                    </div>
                    <a href="#!">
                        <h5 class="section-desc product-item__title">Mid Century Modern Shirt</h5>
                    </a>
                    <p class="product-item__price">$110</p>
                    <div class="product-item__rate">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star">
                        <img src="{{ asset('icons/star.svg') }}" alt="" class="product-item__star">
                        <span class="product-item__review">(540 reviews)</span>
                    </div>
                </article>
            </div>
        </div>
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup()">&times;</span>
                <svg class="tick-icon" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>
                <p>Sản phẩm đã được thêm vào giỏ hàng thành công!</p>
            </div>
        </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.product-feedback-rating__star').hover(
                function() {
                    // Hover-in event
                    $(this).attr('src', '{{ asset('icons/star.svg') }}');
                    $(this).prevAll('.product-feedback-rating__star').attr('src',
                        '{{ asset('icons/star.svg') }}');
                    $(this).nextAll('.product-feedback-rating__star').attr('src',
                        '{{ asset('icons/star-regular.svg') }}');
                },
                function() {
                    // Hover-out event
                    if (!$(this).hasClass('rated')) {
                        $(this).attr('src', '{{ asset('icons/star-regular.svg') }}');
                        $(this).prevAll('.product-feedback-rating__star').attr('src',
                            '{{ asset('icons/star-regular.svg') }}');
                    }
                }
            );

            // Click event
            $('.product-feedback-rating__star').click(function() {
                // Reset all stars to regular
                $('.product-feedback-rating__star').removeClass('rated').attr('src',
                    '{{ asset('icons/star-regular.svg') }}');

                // Highlight stars up to the clicked one
                $(this).addClass('rated').attr('src', '{{ asset('icons/star.svg') }}');
                $(this).prevAll('.product-feedback-rating__star').addClass('rated').attr('src',
                    '{{ asset('icons/star.svg') }}');
            });
        });
        $(document).ready(function() {
            // Xử lý sự kiện click cho nút "Gửi đánh giá"
            $('.product-feedback__submit').click(function() {
                // Lấy giá trị đánh giá và bình luận
                const rating = $('.product-feedback-rating__star.rated').length; // Số lượng sao đã đánh giá
                const comment = $('.product-feedback__comment').val();

                // Kiểm tra xem đã chọn đánh giá chưa
                if (rating === 0) {
                    alert('Vui lòng chọn đánh giá trước khi gửi.');
                    return;
                }

                // Gửi đánh giá lên server
                submitReview(rating, comment);
            });
        });

        // Lấy giá trị token CSRF từ thẻ meta
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Hàm gửi đánh giá lên server
        function submitReview(rating, comment) {
            const productId = "{{ $cloth->cloth_id }}";
            const url = `/api/rate-product/${productId}`;

            console.log(productId);
            // Thêm token CSRF vào yêu cầu
            @auth
            const data = {
                // cloth_id: productId,
                rate: rating,
                comment: comment,
            };

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    console.log('Đánh giá gửi thành công');
                },
                error: function(error) {
                    console.error('Bạn đã đánh giá sản phẩm rồi!', error);
                    // Xử lý lỗi, hiển thị thông báo, vv.
                }
            });
        @else
            alert('Bạn cần đăng nhập để đánh giá sản phẩm.');
        @endauth

        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numValueInput = document.querySelector('.num__value');
            const quantityInput = document.getElementById('quantity');

            // Set giá trị mặc định cho quantityInput khi trang được load
            quantityInput.value = numValueInput.value;

            // Bắt sự kiện khi giá trị của num__value thay đổi
            numValueInput.addEventListener('change', function() {
                quantityInput.value = this.value;
            });


            var rating = {{ $cloth->avg_rate }};
            var numStars = Math.floor(rating); // Lấy phần nguyên của điểm đánh giá
            var partialStar = rating - numStars; // Lấy phần thập phân của điểm đánh giá
            var rating1 = {{ $cloth->avg_rate }};
            var numStars1 = Math.floor(rating1); // Lấy phần nguyên của điểm đánh giá
            var partialStar1 = rating1 - numStars1; // Lấy phần thập phân của điểm đánh giá

            // Lấy tất cả các phần tử ngôi sao có sẵn trong DOM
            var starElements = document.getElementsByClassName('product-detail__star');
            var starElements2 = document.getElementsByClassName('product-rating-overview__star');


            // Thay đổi thuộc tính clip-path của phần tử ngôi sao đầy đủ
            for (var i = 0; i < numStars; i++) {
                starElements[i].style.clipPath =
                'none'; // hoặc 'initial' nếu muốn reset clip-path về giá trị mặc định
            }
            for (var i = 0; i < numStars; i++) {
                starElements2[i].style.clipPath =
                'none'; // hoặc 'initial' nếu muốn reset clip-path về giá trị mặc định
            }
            // Thay đổi thuộc tính clip-path của phần tử ngôi sao thứ 2 nếu có
            if (partialStar > 0 && numStars < starElements.length) {
                var percentage = partialStar * 100;
                starElements[numStars].style.clipPath = 'polygon(0 0, ' + percentage + '% 0, ' + percentage +
                    '% 100%, 0 100%)';
            }
            if (partialStar > 0 && numStars < starElements.length) {
                var percentage = partialStar * 100;
                starElements2[numStars].style.clipPath = 'polygon(0 0, ' + percentage + '% 0, ' + percentage +
                    '% 100%, 0 100%)';
            }

        });
    </script>
    <script>
            function openPopup() {
                document.getElementById('popup').style.display = 'block';
            }

            function closePopup() {
                document.getElementById('popup').style.display = 'none';
            }
    </script>
@endsection
