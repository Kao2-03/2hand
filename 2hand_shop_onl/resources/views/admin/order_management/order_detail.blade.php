@extends('layouts.apps')

@section('content')
<section class = "order-detail">
    <div class="order-detail__container">

        <div class="order-detail__status">
            <div class="order-detail__heading">
                <img src="{{ asset('icons/Cancelled-red.svg') }}" alt="" class="order-detail__heading-icon">
                <p class="order-detail__heading-txt">Cancelled</p>
            </div>
            <p class="order-detail__status-by">Cancelled by the customer</p>
            <p class="order-detail__status-reason">Cancellation reason: Found a lower price elsewhere</p>
        </div>
        {{--  --}}
        <div class="order-detail__customer-info">
            {{-- order number --}}
            <div class="order-detail__order-number">
                <div class="order-detail__heading">
                    <img src="{{ asset('icons/choices-red.svg') }}" alt="" class="order-detail__heading-icon">
                    <p class="order-detail__heading-txt">Order Number</p>
                </div>
                <p class="order-detail__order-number-txt">{{ $invoice_id }}</p>
            </div>
            {{-- Shipping address --}}
            <div class="order-detail__address">
                <div class="order-detail__heading">
                    <img src="{{ asset('icons/delivery-red.svg') }}" alt="" class="order-detail__heading-icon">
                    <p class="order-detail__heading-txt">Shipping Address</p>
                </div>
                <p class="order-detail__address-txt">{{ $info ->address_detail }}, {{ $info ->ward_name }}, 
                    {{ $info ->district_name }}, {{ $info ->province_name }}</p>
            </div>
            {{-- Reason --}}
            <div class="order-detail__reason">
                <div class="order-detail__heading">
                    <img src="{{ asset('icons/delivery-red.svg') }}" alt="" class="order-detail__heading-icon">
                    <p class="order-detail__heading-txt">Reason</p>
                </div>
                <p class="order-detail__reason-txt">I found a better place to purchase (Cheaper, more reputable, faster delivery...)</p>
            </div>
        </div>

        <div class="order-detail__contact">
            <div class="order-detail__contact-">
                <img src="{{ asset($info -> avatar) }}" alt="avartar" class="order-detail__contact-avt">
                <p class="order-detail__contact-name">{{ $info -> user_name }}</p>
            </div>
            <button class="order-detail__contact-chat-btn">Chat now</button>
        </div>
        <div class="order-detail__payment-info">
            <div class="order-detail__payment-info-head">
                <div class="order-detail__heading">
                    <img src="{{ asset('icons/credit-card-red.svg') }}" alt="" class="order-detail__heading-icon">
                    <p class="order-detail__heading-txt">Payment infomation</p>
                </div>
                <div class="order-detail__heading order-detail__trans-history">
                    <img src="{{ asset('icons/trans-history.svg') }}" alt="" class="order-detail__heading-icon">
                    <p class="order-detail__heading-txt">Transaction history</p>
                </div>
            </div>

            <div class="order-detail__list">
                {{-- heading table --}}
                <div class = "order-detail__list-th">Number</div>
                <div class = "order-detail__list-th">Product</div>
                <div class = "order-detail__list-th">Unit Price</div>
                <div class = "order-detail__list-th">Quantity</div>
                <div class = "order-detail__list-th">Total amount</div>
                @if (collect($invoiceDetails)->isNotEmpty())
                 @foreach ($invoiceDetails as $key => $value)
                
                {{-- table row --}}
                    <p class="order-detail__list-number">{{ $key + 1 }}</p>
                    <a class="order-detail__list-product">
                        <img src="{{ asset($value -> img) }}" alt="" class="order-detail__list-product-img">
                        <div class="order-detail__list-product-">
                            <p class="order-detail__list-product-status">Cancelled</p>
                            <p class="order-detail__list-product-name">{{ $value -> cloth_name }}</p>
                        </div>
                    </a>
                    <p class="order-detail__list-price">${{ $value -> cost }}</p>
                    <p class="order-detail__list-quantity">x{{ $value -> quantity }}</p>
                    <p class="order-detail__list-total-price">${{ $value -> sum_cost }}</p>
                @endforeach
                @endif
            </div>
                
            <div class="order-detail__total">
                <div class="order-detail__total-label">
                    <div class="order-detail__total-label-product">Total product</div>
                    {{-- <div class="order-detail__total-label-price">Product price</div> --}}
                    {{-- <div class="order-detail__total-label-cancelled">Amount Cancelled</div> --}}
                    <div class="order-detail__total-label-shipfee">Shipping fee</div>
                    <div class="order-detail__total-label-revenue">Order revenue</div>
                </div>
                <div class="order-detail__total-number">
                    <div class="order-detail__total-number-hide">
                        <p class="order-detail__total-number-hide-txt">Hide revenue details</p>
                        <img src="{{ asset('icons/down.svg') }}" alt="" class="order-detail__total-number-hide-icon">
                    </div>
                    <div class="order-detail__total-number-product">${{ $total_cost -2 }}</div>
                    {{-- <div class="order-detail__total-number-price">$237.45</div> --}}
                    {{-- <div class="order-detail__total-number-Cancelled">-$237.45</div> --}}
                    <div class="order-detail__total-number-shipfee">$2</div>
                    <div class="order-detail__total-number-revenue">${{ $total_cost }}</div>
                </div>
            </div>
        </div>
        <div class="order-detail__payment-final">
            <p class="order-detail__payment-final-label">Final amount</p>
            <p class="order-detail__payment-final-price">${{ $total_cost }}</p>
        </div>
        <div class="order-detail__customer-pay">
            <div class="order-detail__heading">
                <img src="{{ asset('icons/payment-method-red.svg') }}" alt="" class="order-detail__heading-icon">
                <p class="order-detail__heading-txt">Customer's payment</p>
            </div>
        </div>
    </div>
    <div class="order-detail__history">
        <div class="order-detail__history-heading">
            <hr>
            HISTORY ORDER
            <hr>
        </div>

        <div class="order-detail__history-process">
            {{-- process 1 --}}
            <img src="{{ asset('icons/cancel-blue.svg') }}" alt="" class="order-detail__history-process-icon">
            <p class="order-detail__history-process-txt">Cancelled Order</p>
            <hr class = "vertical-line">
            <div class="order-detail__history-date">21:45 18/07/2022</div>
            {{-- process 2 --}}
            <img src="{{ asset('icons/cancel-blue.svg') }}" alt="" class="order-detail__history-process-icon">
            <p class="order-detail__history-process-txt">New Order</p>
            <hr class = "vertical-line">
            <div class="order-detail__history-date">21:45 18/07/2022</div>
            {{-- process 3 --}}
            <img src="{{ asset('icons/cancel-blue.svg') }}" alt="" class="order-detail__history-process-icon">
            <p class="order-detail__history-process-txt">New Order</p>
            <hr class = "vertical-line">
            <div class="order-detail__history-date">21:45 18/07/2022</div>
        </div>
        <div class="order-detail__history-add-note">
            <div class="order-detail__history-sub-head">
                <img src="{{ asset('icons/essay.svg') }}" alt="" class="order-detail__history-sub-head-icon">
                <p class="order-detail__history-sub-head-txt">Add Note</p>
            </div>
            <p class="order-detail__history-add-note-txt">Note is not visible to the customer</p>
            <button class="order-detail__history-add-note-savebtn">Save</button>
            <button class="order-detail__history-add-note-cancelbtn">Cancel</button>
            
        </div>
    </div>
</section>
@endsection