@extends('layouts.app')
@section('content')
    <section class="checkout">
        <div class="container">
            <div class="checkout__header">
                <h1 class="section-heading">Checkout</h1>
            </div>

            <div class=" checkout__content">
                <div class="checkout__items checkout__address">
                    <div class="checkout__address-title">
                        <img src="{{ asset('icons/Location.svg') }}" alt="">
                        <p>Địa chỉ nhận hàng</p>
                    </div>
                    <div class="checkout__address-detail">
                        @if ($infoFirst)
                            <div class="address-information name">{{ $infoFirst->address_name }}</div>
                            <div class="address-information number">{{ $infoFirst->phone }}</div>
                            <div class="address-information address">{{ $infoFirst->address_detail }},
                                {{ $infoFirst->ward_name }},
                                {{ $infoFirst->district_name }}, {{ $infoFirst->province_name }}</div>
                        @else
                            <div class="address-information name"></div>
                            <div class="address-information number"></div>
                            <div class="address-information address"></div>
                        @endif
                        <button class="btn checkout__address-detail-btn" onclick="openPopup()">Thay đổi</button>
                    </div>
                </div>
                <div class="checkout__items">
                    <ul class="checkout__list">
                        <li class="checkout__list-item">
                            <h3 class="title title-product">Product</h3>
                            <h3 class="title">Unit Price</h3>
                            <h3 class="title">Quantity</h3>
                            <h3 class="title">Total Amout</h3>
                        </li>
                        @foreach ($cart as $key => $value)
                            <li class="checkout__list-item">
                                <div class="product">
                                    <img src="{{ asset($value->img) }}" alt="Ảnh sản phẩm" class="product__image">
                                    <p class="product__name">{{ $value->cloth_name }}</p>
                                </div>
                                <p class="unitprice">${{ $value->cost }}</p>
                                <p class="quantity">{{ $value->quantity }}</p>
                                <p class="totalamout">${{ $value->sum_cost }}</p>
                            </li>
                            <hr class="hr-separate">
                        @endforeach

                        <div class="ship-option">
                            <p class="ship-option__header">Shipping Option:</p>
                            <div class="ship-option__status">
                                <h4 class="ship-option__status--status">Nhanh</h4>
                                <p class="ship-option__status--time">Nhận hàng vào 29 Th10 - 3 Th11</p>
                            </div>
                            <button class="ship-option__change">Thay đổi</button>
                            <p class="ship-option__cost">$2</p>
                        </div>
                </div>
            </div>
            <div class="checkout__items checkout__footer">
                <div class="checkout__footer-header">
                    <p class="voucher">Voucher</p>
                    <button class="select">Select Voucher</button>
                </div>
                <hr class="hr-separate">
                <div class="checkout__footer-payment">
                    <p class="payment-method">Payment Method</p>
                    <div class="payment-method-choose" role="radiogroup">
                        <button class="method-variation method-variation--selected" onclick="selectPaymentMethod(this)"
                            role="radio" aria-disabled="false" aria-checked="true">Chuyển khoản</button>
                        {{-- <button class="method-variation method-variation--disabled" onclick="selectPaymentMethod(this)"
                            role="radio" aria-disabled="true" aria-checked="false">Ví VNPay</button> --}}
                        <button class="method-variation method-variation--disabled" onclick="selectPaymentMethod(this)"
                            role="radio" aria-disabled="true" aria-checked="false">Thanh toán khi nhận hàng</button>
                        {{-- <a href="{{ route('your.payment.route') }}?payment_method=ChuyenKhoan">Chuyển khoản</a>
                        <a href="{{ route('your.payment.route') }}?payment_method=ViVNPay" aria-disabled="true">Ví VNPay</a>
                        <a href="{{ route('your.payment.route') }}?payment_method=ThanhToanKhiNhanHang" aria-disabled="true">Thanh toán khi nhận hàng</a> --}}
                    </div>

                </div>
                <hr class="hr-separate">
                <div class="checkout__footer-infor">
                    <h2 class="hidden"></h2>
                    <h3 class="title">Merchandise Subtotal</h3>
                    <div class="value">${{ $totalCost }}</div>
                    <h3 class="title">Shipping Total</h3>
                    <div class="value">$2</div>
                    <h3 class="title">Voucher Total</h3>
                    <div class="value">$0</div>
                    <h3 class="title">Total Payment</h3>
                    <div class="value total">${{ $totalCost + 2 }}</div>
                </div>
                <hr class="hr-separate">
                <div class="checkout__footer-button">
                    <form id="checkoutForm" action="{{ route('checkout.updateOrder') }}" method="POST">
                        @csrf
                        @if ($infoFirst)
                            <input type="hidden" name="address_id" id="address_id" value="{{ $infoFirst->address_id }}">
                        @endif
                        <input type="hidden" name="total_value" id="total_value" value="{{ $totalCost + 2 }}">
                        <input type="hidden" name="pay_method" id="pay_method" value="Chuyển khoản">
                        <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $newlyInsertedInvoiceId }}">
                        <button type="submit" class="btn place-order">Place Order</button>
                    </form>
                    <form id="vnpayForm" action="{{ route('vnpay.payment') }}" method="POST">
                        @csrf
                        <input name='total' value="{{ $totalCost + 2 }}" type="hidden">
                        <input type="hidden" name="order_id" value="{{ $newlyInsertedInvoiceId }}">
                        @if ($infoFirst)
                        <input type="hidden" name="address" value="{{ $infoFirst->address_id }}">
                        @endif
                        <!-- Add your form fields here -->
                        <button type="submit" name="redirect" class="btn place-order">VNPAY</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="checkout__popup" id="addressPopup">
            <div class="checkout__popup-content">
                <span class="checkout__popup-close" onclick="closePopup()">&times;</span>
                <!-- Nội dung của popup -->
                <h2>Chọn Địa Chỉ Khác</h2>
                <!-- Thêm các trường và nút chọn địa chỉ khác vào đây -->
                @foreach ($info as $key => $value)
                    <span class="checkout__popup-address"
                        onclick="selectAddress('{{ $value->address_id }}','{{ $value->address_name }}', 
                '{{ $value->phone }}', '{{ $value->address_detail }}', '{{ $value->ward_name }}', '{{ $value->district_name }}', 
                '{{ $value->province_name }}')">
                        <div class="checkout__popup-name">{{ $value->address_name }}</div>
                        <div class="checkout__popup-number">{{ $value->phone }}</div>
                        <div class="checkout__popup-addressDetail">{{ $value->address_detail }},
                            {{ $value->ward_name }},
                            {{ $value->district_name }}, {{ $value->province_name }}</div>
                    </span>
                @endforeach

            </div>
        </div>
    </section>
    <script>
        function openPopup() {
            var popup = document.getElementById('addressPopup');
            popup.style.display = 'block';
        }

        function closePopup() {
            var popup = document.getElementById('addressPopup');
            popup.style.display = 'none';
        }

        function selectAddress(id, name, phone, addressDetail, ward, district, province) {
            // Gán thông tin địa chỉ được chọn vào biến $infoFirst
            var infoFirst = {
                address_id: id,
                address_name: name,
                phone: phone,
                address_detail: addressDetail,
                ward_name: ward,
                district_name: district,
                province_name: province
            };

            // Hiển thị thông tin địa chỉ đã chọn trong trang
            updateInfoFirst(infoFirst);
            // Cập nhật giá trị address_id
            document.getElementById('address_id').value = id;

            // Đóng popup
            closePopup();
        }

        function updateInfoFirst(info) {
            // Cập nhật thông tin địa chỉ trong trang
            document.querySelector('.checkout__address-detail .name').innerText = info.address_name;
            document.querySelector('.checkout__address-detail .number').innerText = info.phone;
            document.querySelector('.checkout__address-detail .address').innerText = info.address_detail + ', ' + info
                .ward_name + ', ' + info.district_name + ', ' + info.province_name;

        }

        function selectPaymentMethod(button) {
            // Loại bỏ lớp "method-variation--selected" từ tất cả các nút
            var allButtons = document.querySelectorAll('.method-variation');
            allButtons.forEach(function(btn) {
                btn.classList.remove('method-variation--selected');
            });

            // Thêm lớp "method-variation--selected" cho nút được chọn
            button.classList.add('method-variation--selected');
            // Cập nhật giá trị pay_method
            document.getElementById('pay_method').value = button.innerText;
        }
    </script>
    <script>
        window.onload = function() {
            // Thực hiện kiểm tra ở đây và chuyển hướng nếu cần
            var name = document.querySelector('.address-information.name');
            var number = document.querySelector('.address-information.number');
            var address = document.querySelector('.address-information.address');

            if (!name.innerHTML || !number.innerHTML || !address.innerHTML) {
                // Hiển thị thông báo và chuyển hướng
                alert('Vui lòng nhập đầy đủ thông tin địa chỉ.');
                window.location.href = 'http://127.0.0.1:8000/user/address';
            }
        };

        $("#vnpayForm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "{{ route('vnpay.payment') }}",
                data: $(this).serialize(),
                success: function(response) {
                    // Handle success response
                },
                error: function(error) {
                    // Handle error
                }
            });
        });
    </script>
    <script>
        window.onload = function() {
            // Thực hiện kiểm tra ở đây và chuyển hướng nếu cần
            var name = document.querySelector('.address-information.name');
            var number = document.querySelector('.address-information.number');
            var address = document.querySelector('.address-information.address');

            if (!name.innerHTML || !number.innerHTML || !address.innerHTML) {
                // Hiển thị thông báo và chuyển hướng
                alert('Vui lòng nhập đầy đủ thông tin địa chỉ.');
                window.location.href = 'http://127.0.0.1:8000/user/address';
            }
        };
    </script>
@endsection
