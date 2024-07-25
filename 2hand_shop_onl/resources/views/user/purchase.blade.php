@extends('layouts.app-user')

@section('content')
    <div class="purchase">
        <div id="purchase-filter" class="tab-list">
            <button class="tab-item tab-item--active" data-filter="all">All</button>
            <button class="tab-item" data-filter="on_delivery">On Delivery</button>
            <button class="tab-item" data-filter="delivered">Delivered</button>
            <button class="tab-item" data-filter="completed">Completed</button>
            <button class="tab-item" data-filter="canceled">Cancellation</button>
            <button class="tab-item" data-filter="return">Return/Refund</button>
        </div>

        <div class="search-wrapper">
            <label for="search" class="search__icon">
                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.344 19L15.094 14.7425M17.454 9.0526C17.454 11.1883 16.604 13.2365 15.094 14.7467C13.584 16.2569 11.534 17.1053 9.39404 17.1053C7.26404 17.1053 5.21398 16.2569 3.70398 14.7467C2.19398 13.2365 1.34399 11.1883 1.34399 9.0526C1.34399 6.9169 2.19398 4.8687 3.70398 3.3586C5.21398 1.8484 7.26404 1 9.39404 1C11.534 1 13.584 1.8484 15.094 3.3586C16.604 4.8687 17.454 6.9169 17.454 9.0526Z"
                        stroke="#bbbbbb" stroke-width="2" stroke-linecap="round" />
                </svg>
            </label>
            <input type="text" name="search" id="search" placeholder="Có thể xem ID đơn hàng hoặc tên sản phẩm"
                class="header__input user-order__search" autocomplete="off">
        </div>

        {{-- ------------- All ------------- --}}
        @if (collect($ordersGrouped)->isNotEmpty())
            @foreach ($ordersGrouped as $orderId => $orderItems)
                <div class="purchase__inner">
                    @if ($orderItems->first()->status=='Waiting')
                    <a href="{{ route('checkout.index2', ['invoice_id' => $orderItems->first()->invoice_id]) }}" class="btn recheckout-btn">Đến trang xác nhận đặt hàng</a>
                    @endif
                    <div class="purchase-header">
                        <button class="purchase__btn">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path fill="#fff"
                                    d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                            </svg>
                            Chat
                        </button>
                        <div class="purchase-header-wrapper">
                            <p class="purchase__done">{{ $orderItems->first()->status  }}</p>
                        </div>
                    </div>
                    <div class="purchase__separate"></div>
                    @foreach ($orderItems as $item)
                        <div class="purchase-item">
                            <img src="{{ asset($item->img) }}" alt="" class="purchase__img">
                            <div class="purchase-item__content">
                                <p class="purchase__name">
                                    {{ $item->cloth_name }}
                                </p>
                                <p class="purchase__type">Size: {{ $item->size_id }}</p>
                                <p class="purchase__type">Số lượng: {{ $item->quantity }}</p>
                            </div>
                            <p class="purchase__price">
                                {{ $item->cost }}
                            </p>
                        </div>
                    @endforeach


                    <div class="purchase__separate"></div>

                    <div class="purchase-footer">
                        <p class="purchase__total">Thành tiền: <strong
                                class="purchase__total-decor">{{ $orderItems->first()->total_value }}</strong></p>
                        <div class="purchase-footer-wrapper">
                            <a href="#!" class="btn purchase-footer__btn">Repurchase</a>
                            <a href="#!" class="btn btn--outline purchase-footer__btn">Contact to Shop</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        @endif
    </div>

    <script>
        const $1 = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const filterList = $1("#purchase-filter");
        const filterButtons = filterList.querySelectorAll(".tab-item");
        const pruchaseItems = $$(".purchase__inner");

        filterButtons.forEach((button) => {
            button.addEventListener("click", (e) => {
                const filter = e.target.getAttribute('data-filter');

                updateActiveButton(e.target);
                filterConsigns(filter);
            });
        });

        function updateActiveButton(newButton) {
            filterList
                .querySelector('.tab-item--active')
                .classList.remove('tab-item--active');
            newButton.classList.add("tab-item--active");
        }

        function filterConsigns(consignFilter) {
            pruchaseItems.forEach(item => {
                const consState = item.getAttribute('data-state');

                if (consignFilter === 'all' || consignFilter === consState) {
                    item.classList.remove('purchase--hide');
                } else {
                    item.classList.add('purchase--hide');
                }
            });
        }
    </script>
@endsection
