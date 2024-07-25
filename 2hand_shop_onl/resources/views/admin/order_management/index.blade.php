@extends('layouts.app-admin')

@section('content')
    <section class = "order">
        <div class="order__status" id="order-filter">
            <button class = "order__status-list isChoose" data-filter="all">All</button>
            <button class = "order__status-list " data-filter="pending">Pending</button>
            <button class = "order__status-list" data-filter="confirm">confirm</button>
            <button class = "order__status-list">On Delivery</button>
            <button class = "order__status-list">Deliveried</button>
            <button class = "order__status-list" data-filter="cancel">Return/Refund</button>
        </div>

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
            <div class="order__list-heading">{{ $count }} Orders</div>
            
                {{-- table heading --}}
            <div class = "order__list-th">Product</div>
            <div class = "order__list-th">Total Order</div>
            <div class = "order__list-th">Status</div>
            <div class = "order__list-th" style="justify-content: center;">Action</div>
                {{-- Khung order 1 --}}
            @if (collect($ordersGrouped)->isNotEmpty())
            @php $currentInvoiceId = null @endphp
            @foreach ($ordersGrouped as $orderId => $orderItems)
                @foreach ($orderItems as $orderItem)
                    @if ($orderItem->invoice_id !== $currentInvoiceId)
                        {{-- Chỉ hiển thị nếu invoice_id khác với invoice_id trước đó --}}
                    <div class="order-item" data-state="{{ $orderItem->status }}">
                        <div class="order__list-user" >
                            <img src="{{ asset($orderItem->avatar) }}" alt="avartar" class="order__list-user-avt">
                            <p class="order__list-user-name">{{ $orderItem->name }}</p>
                            <img src="{{ asset('icons/chat.svg') }}" alt="" class="order__list-user-chat">
                        </div>
                        <div class="order__list-number">
                            <p>Order Number </p>
                            <p class="order__list-number-val">{{ $orderId }}</p>
                        </div>
                        @php $currentInvoiceId = $orderItem->invoice_id @endphp
                         {{-- Chỉ hiển thị một sản phẩm đầu tiên --}}
                    <a class="order__list-product">
                        <img src="{{ asset($orderItem->img) }}" alt="" class="order__list-product-img">
                        <div class="order__list-product-">
                            <p class="order__list-product-status {{ strtolower($orderItem->status) }}">{{ $orderItem->status }}</p>
                            <p class="order__list-product-name">{{ $orderItem->cloth_name }}</p>
                            <p class="order__list-product-quantity">{{ $orderItem->quantity }}</p>
                        </div>
                    </a>
        
                    {{-- Các trường thông tin khác --}}
                    <div class="order__list-total">${{ $orderItem->total_value }}</div>
                    <div class="order__list-status">
                        <p class="order__list-status-val">{{ $orderItem->status }}</p>
                    </div>
                    <div class="order__list-detail">
                        <div class="consign-mnm-cta">
                            <form action="{{ route('admin.order_management.update', $orderItem->invoice_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                            @if (strtolower($orderItem->status) == 'pending')
                                <button type="submit" class="consign-mnm-cta__btn">
                                @else
                                    <button type="submit" class="consign-mnm-cta__btn btn__confirm">
                            @endif

                            <svg width="40" height="46" viewBox="0 0 40 46" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect y="3" width="40" height="40" rx="6" fill="#16C099"
                                    fill-opacity="0.3" />
                                <path
                                    d="M32.5119 15.481C33.1536 16.1227 33.1536 17.1647 32.5119 17.8064L19.3705 30.9478C18.7289 31.5895 17.6868 31.5895 17.0451 30.9478L10.4744 24.3771C9.83275 23.7354 9.83275 22.6934 10.4744 22.0517C11.1161 21.41 12.1582 21.41 12.7998 22.0517L18.2104 27.4571L30.1916 15.481C30.8333 14.8393 31.8754 14.8393 32.517 15.481H32.5119Z"
                                    fill="#008767" />
                            </svg>
                            </button>
                            </form>

                            {{-- Kết thúc nút xác nhận --}}
                            <button type="button" onclick="initJsToggle()" class="consign-mnm-cta__btn js-toggle"
                                toggle-target="#delete-consign" style="margin-left: -4px">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="6" fill="#C01616" fill-opacity="0.3" />
                                    <path
                                        d="M17.2533 10.2706L16.2779 11.6775H23.7221L22.7467 10.2706C22.6696 10.1616 22.5413 10.0923 22.4027 10.0923H17.5922C17.4536 10.0923 17.3252 10.1567 17.2482 10.2706H17.2533ZM24.8002 8.95285L26.6844 11.6775H27.3929H29.8571H30.2679C30.9507 11.6775 31.5 12.2076 31.5 12.8665C31.5 13.5254 30.9507 14.0555 30.2679 14.0555H29.8571V29.1156C29.8571 31.3052 28.0192 33.0788 25.75 33.0788H14.25C11.9808 33.0788 10.1429 31.3052 10.1429 29.1156V14.0555H9.73214C9.04933 14.0555 8.5 13.5254 8.5 12.8665C8.5 12.2076 9.04933 11.6775 9.73214 11.6775H10.1429H12.6071H13.3156L15.1998 8.9479C15.7337 8.18003 16.6321 7.71436 17.5922 7.71436H22.4027C23.3627 7.71436 24.2612 8.18003 24.7951 8.9479L24.8002 8.95285ZM12.6071 14.0555V29.1156C12.6071 29.9924 13.3413 30.7008 14.25 30.7008H25.75C26.6587 30.7008 27.3929 29.9924 27.3929 29.1156V14.0555H12.6071ZM16.7143 17.226V27.5303C16.7143 27.9662 16.3446 28.3229 15.8929 28.3229C15.4411 28.3229 15.0714 27.9662 15.0714 27.5303V17.226C15.0714 16.7901 15.4411 16.4334 15.8929 16.4334C16.3446 16.4334 16.7143 16.7901 16.7143 17.226ZM20.8214 17.226V27.5303C20.8214 27.9662 20.4518 28.3229 20 28.3229C19.5482 28.3229 19.1786 27.9662 19.1786 27.5303V17.226C19.1786 16.7901 19.5482 16.4334 20 16.4334C20.4518 16.4334 20.8214 16.7901 20.8214 17.226ZM24.9286 17.226V27.5303C24.9286 27.9662 24.5589 28.3229 24.1071 28.3229C23.6554 28.3229 23.2857 27.9662 23.2857 27.5303V17.226C23.2857 16.7901 23.6554 16.4334 24.1071 16.4334C24.5589 16.4334 24.9286 16.7901 24.9286 17.226Z"
                                        fill="#C01616" />
                                </svg>
                            </button>
                            {{-- Kết thúc của Nút xóa --}}
                            <a href="{{ route('admin.order_management.order_detail', ['invoice_id' => $orderItem->invoice_id]) }}">
                            <button type="button" onclick="initJsToggle()" class="consign-mnm__icon js-toggle"
                                toggle-target="#detail-consign">
                                <img src="{{ asset('icons/detail.svg') }}" alt="">
                            </button>
                            </a>
                            {{-- Kết thúc nút detail --}}
                        </div>
                        {{-- <a href="{{ route('admin.order_management.order_detail', ['invoice_id' => $orderItem->invoice_id]) }}">
                            <button class="order__list-detail-btn">
                                <img src="{{ asset('icons/search1.svg') }}" alt="" class="order__list-detail-btn-icon">
                                View details
                            </button>
                        </a> --}}
                    </div>
                    </div>
                    @endif
        
                   
                @endforeach
                @endforeach
            @endif
            
             
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


        //
        // document.addEventListener("DOMContentLoaded", function () {
        const $1 = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const filterList = $1("#order-filter");
        const filterButtons = filterList.querySelectorAll(".order__status-list");
        const orderItems = $$(".order-item");
        console.log(filterButtons)
        filterButtons.forEach((button) => {
            button.addEventListener("click", (e) => {
                e.preventDefault();

                const filter = e.target.getAttribute("data-filter");

                updateActiveButton(e.target);
                filterOrders(filter);
            });
        });

        function updateActiveButton(newButton) {
            filterList
                .querySelector(".isChoose")
                .classList.remove("isChoose");
            newButton.classList.add("isChoose");
        }

        function filterOrders(orderFilter) {
            orderItems.forEach((item) => {
                const orderState = item.getAttribute("data-state");

                if (orderFilter === "all" || orderFilter=== orderState) {
                    item.classList.remove("order--hide");
                } else {
                    item.classList.add("order--hide");
                }
            });
        }
    // });

    </script>
@endsection