@extends('layouts.app-admin')

@section('content')
    <section class = "order">
        <ul class="order__status">
            <li class = "order__status--all ">All</li>
            <li class = "order__status--confirmation isChoose">Pending Confirmation</li>
            <li class = "order__status--pickup">Pending Pickup</li>
            <li class = "order__status--OnDelivery">On Delivery</li>
            <li class = "order__status--Deliveried">Deliveried</li>
            <li class = "order__status--Return">Return/Refund</li>
            <li class = "order__status--Delivery-Unsucessful">Delivery Unsucessful</li>
        </ul>

        <div class = "order_">
            <div class="order__datetime">
                <label for="order_date-start" class="order__datetime-label">Order date</label>
                <input type="date" id="order_date-start" class = "order__datetime-input">  
                <label for="">-</label>
                <input type="date" id="order_date-end" class = "order__datetime-input">
                {{-- Sau nhớ phải xử lí chỗ này sao cho ngày start nhỏ hơn ngày end, với lại không quá 1 tháng --}}
            </div>
        </div>
        {{-- filter --}}
        <div class="order__filter-container">
            <div class="order__filter">
                <div class="order__filter-category">
                    <p class = "order__filter-category-val">Order Number</p>
                    <img src="{{ asset('icons/arrow-up.svg') }}" alt="" class = "arrow-up">

                    <ul class="order__filter-categorybox display">
                        <li class="order__filter-categorybox-val">Order Number</li>
                        <li class="order__filter-categorybox-val">Product</li>
                        <li class="order__filter-categorybox-val">Customer Name</li>
                    </ul>
                </div>


                <input type="text" placeholder="Filter Order" name="order_value" id="order_value" class = "order__filter-value">
                <img src="{{ asset('icons/search.svg') }}" alt="" class="order__filter-icon">
                
            </div>

            <button class="order__filter-btn--search">Search</button>
            <button class="order__filter-btn--reset">Reset</button>

        </div>

        {{-- order list --}}
        <div class="order__list">
            <div class="order__list-heading">2 Orders</div>
            
                {{-- table heading --}}
            <div class = "order__list-th">Product</div>
            <div class = "order__list-th">Total Order</div>
            <div class = "order__list-th">Status</div>
            <div class = "order__list-th">Action</div>
                {{-- Khung order 1 --}}
            <div class="order__list-user">
                <img src="{{ asset('images/avt.png') }}" alt="avartar" class="order__list-user-avt">
                <p class="order__list-user-name">SonTungMTP</p>
                <img src="{{ asset('icons/chat.svg') }}" alt="" class="order__list-user-chat">
            </div>
            <div class = "order__list-number">
                <p>Order Number </p>
                <p class="order__list-number-val">220718RR6CPUYP</p>
            </div>
                
            <a class="order__list-product">
                <img src="{{ asset('images/product-wishlist1.png') }}" alt="" class="order__list-product-img">
                <div class="order__list-product-">
                    <p class="order__list-product-status">Cancelled</p>
                    <p class="order__list-product-name">Stockholm Minimal Chair</p>
                    <p class="order__list-product-quantity">x1</p>
                </div>
            </a>
            
            <div class="order__list-total">$237.45</div>
            <div class = "order__list-status">
                <p class="order__list-status-val">Cancelled</p>
                <p class="order__list-status-by">Cancelled by customer</p>
            </div>
            <div class="order__list-detail">
                <a href="/order-detail">
                    <button class="order__list-detail-btn">
                        <img src="{{ asset('icons/search1.svg') }}" alt="" class="order__list-detail-btn-icon">
                        View details
                    </button>
                </a>
            </div>

             {{-- Khung order 2 --}}
             <div class="order__list-user">
                <img src="{{ asset('images/avt.png') }}" alt="avartar" class="order__list-user-avt">
                <p class="order__list-user-name">SonTungMTP</p>
                <img src="{{ asset('icons/chat.svg') }}" alt="" class="order__list-user-chat">
            </div>
            <div class = "order__list-number">
                <p>Order Number </p>
                <p class="order__list-number-val">220718RR6CPUYP</p>
            </div>
                
            <a class="order__list-product">
                <img src="{{ asset('images/product-wishlist1.png') }}" alt="" class="order__list-product-img">
                <div class="order__list-product-">
                    <p class="order__list-product-status">Cancelled</p>
                    <p class="order__list-product-name">Stockholm Minimal Chair</p>
                    <p class="order__list-product-quantity">x1</p>
                </div>
            </a>
            
            <div class="order__list-total">$237.45</div>
            <div class = "order__list-status">
                <p class="order__list-status-val">Cancelled</p>
                <p class="order__list-status-by">Cancelled by customer</p>
            </div>
            <div class="order__list-detail">
                <a href="/order-detail">
                    <button class="order__list-detail-btn">
                        <img src="{{ asset('icons/search1.svg') }}" alt="" class="order__list-detail-btn-icon">
                        View details
                    </button>
                </a>
            </div>

            {{-- Khung order 3 --}}
            <div class="order__list-user">
                <img src="{{ asset('images/avt.png') }}" alt="avartar" class="order__list-user-avt">
                <p class="order__list-user-name">SonTungMTP</p>
                <img src="{{ asset('icons/chat.svg') }}" alt="" class="order__list-user-chat">
            </div>
            <div class = "order__list-number">
                <p>Order Number </p>
                <p class="order__list-number-val">220718RR6CPUYP</p>
            </div>
                
            <a class="order__list-product">
                <img src="{{ asset('images/product-wishlist1.png') }}" alt="" class="order__list-product-img">
                <div class="order__list-product-">
                    <p class="order__list-product-status">Cancelled</p>
                    <p class="order__list-product-name">Stockholm Minimal Chair</p>
                    <p class="order__list-product-quantity">x1</p>
                </div>
            </a>
            
            <div class="order__list-total">$237.45</div>
            <div class = "order__list-status">
                <p class="order__list-status-val">Cancelled</p>
                <p class="order__list-status-by">Cancelled by customer</p>
            </div>
            <div class="order__list-detail">
                <a href="/order-detail">
                    <button class="order__list-detail-btn">
                        <img src="{{ asset('icons/search1.svg') }}" alt="" class="order__list-detail-btn-icon">
                        View details
                    </button>
                </a>
            </div>
        </div>
       
    </section>
    <script>
        var category = document.querySelector('.order__filter-category');
        var categorybox = document.querySelector('.display');
        var arrowIcon = document.querySelector('.arrow-up');
        category.onclick = function() {
            categorybox.classList.toggle('show');
            arrowIcon.classList.toggle('rotate');
        }


        var categoryValues = document.querySelectorAll('.order__filter-categorybox-val');
        var categoryText = document.querySelector('.order__filter-category-val');

        categoryValues.forEach(function(categoryValue) {
            categoryValue.addEventListener('click', function() {
                categoryText.innerHTML = categoryValue.innerHTML;
            });
        });
    </script>
@endsection