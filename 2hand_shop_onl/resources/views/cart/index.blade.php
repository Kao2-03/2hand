@extends('layouts.app')

@section('content')
    <section class = "cart">
        <div class="container">
            <h1 class="cart__title">Shopping cart ({{ $count }} items)</h1>
            <table class="cart__table">
                <tr>
                    <th></th>
                    <th class="cart-product">Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số Lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                {{-- Hàng 1 --}}
                @foreach ($cart as $key => $value)
                    <tr>
                        <td><input type="checkbox" name="isChoose" id="Cart__isChoose" data-cart-detail-id="{{ $value->cart_detail_id }}" data-cart-detail-key="{{ $key }}"></td>
                        <td>
                            <div class="cart__product-info">
                                <img src="{{ asset( $value -> img ) }}" alt="" class="cart__img">
                                <p class="cart__product-name">{{ $value -> cloth_name }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="cart__cost">{{ $value -> cost }}</div>
                        </td>
                        <td>
                            <div class="cart__quantity-container">
                                <button onclick="decrementValue('cart__quantity_{{ $key }}')" class="cart__quantity-btn">-</button>
                                <input type="number" id="cart__quantity_{{ $key }}" name="quantity" min="1" max="100"
                                    step="1" value="{{ $value -> quantity }}" oninput="adjustSize(this)" class = "cart__quantity">
                                <button onclick="incrementValue('cart__quantity_{{ $key }}')" class="cart__quantity-btn">+</button>
                            </div>
                        </td>
                        <td>
                            <div class="cart__sumCost">{{ $value -> sum_cost }}</div>
                        </td>
                        <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa khum ?')" href="{{ route('cart.delete', ['cart_detail_id' => $value -> cart_detail_id]) }}" class="btn cart__delete">Xóa</a></td>
                    </tr>
                    
                @endforeach
                {{-- Hàng 4 --}}
                <tr>
                    <td><input type="checkbox" name="isChoose-all" id="cart__choose-all"></td>
                    <!-- Thêm form xóa -->
                    <form action="{{ route('cart.deleteSelected') }}" method="post" id="deleteSelectedForm">
                        @csrf
                        <input type="hidden" name="selectedIds" id="selectedIds">
                    </form>

                    <!-- Thay đổi nút xóa ở hàng cuối cùng để gửi form khi được nhấn -->
                    <td>
                        <div class="cart__delete-all">
                            <label for="cart__choose-all">Chọn tất cả</label>
                            <button type="button" class="btn cart__delete" onclick="deleteSelected()" >Xóa</button>
                        </div>
                    </td>
                    <form action="{{ route('cart.updateSelected') }}" method="post" id="updateSelectedForm">
                        @csrf
                        <input type="hidden" name="selectedIds" id="updateSelectedIds">
                        <input type="hidden" name="quantities" id="quantities">
                        <input type="hidden" name="totalCost" id = "totalCost">
                        <input type="hidden" name="cart_id" id="cart_id" value="{{ $cart_id->cart_id }}">
                    </form>

                    <td colspan="4">
                        <div class="cart__total">
                            <label for="" class = "cart__label">Tổng thanh toán:</label>
                            <label for="" class = "cart__totalCost" id = "cart__totalCost">0 VNĐ</label>
                            
                            <a class="btn cart__buy-btn" onclick="updateSelected()">Mua hàng</a>
                            
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <script>
            function adjustSize(input) {
                // Đặt kích thước tối thiểu
                var minSize = 24;

                // Lấy giá trị từ ô số lượng
                var quantity = parseInt(input.value);

                // Lấy đơn giá từ ô đơn giá tương ứng
                var costCell = input.closest('tr').querySelector('.cart__cost');
                var cost = parseInt(costCell.textContent.replace('$', ''));

                // Tính toán kích thước mới dựa trên độ dài chuỗi giá trị
                var length = input.value.length;
                var newSize = Math.max(minSize, length * 10);

                // Đặt kích thước mới
                input.style.width = newSize + 'px';

                // Cập nhật thành tiền
                updateSumCost(input, quantity, cost);
            }

            function incrementValue(quantityId) {
                var input = document.getElementById(quantityId);
                var value = parseFloat(input.value, 10);
                if (!isNaN(value)) {
                    input.value = value + 1;
                } else {
                    input.value = 1;
            }

            // Gọi hàm cập nhật thành tiền khi tăng số lượng
            adjustSize(input);

            // Lấy thông tin cần thiết để cập nhật thành tiền
            var quantity = parseInt(input.value);
            var costCell = input.closest('tr').querySelector('.cart__cost');
            var cost = parseFloat(costCell.textContent.replace('$', ''));

            // Gọi hàm cập nhật thành tiền cho hàng tương ứng
            updateSumCost(input, quantity, cost);
        }

        function decrementValue(quantityId) {
            var input = document.getElementById(quantityId);
            var value = parseFloat(input.value, 10);
            if (!isNaN(value) && value > 1) {
                input.value = value - 1;
            }

            // Gọi hàm cập nhật thành tiền khi giảm số lượng
            adjustSize(input);

            // Lấy thông tin cần thiết để cập nhật thành tiền
            var quantity = parseInt(input.value);
            var costCell = input.closest('tr').querySelector('.cart__cost');
            var cost = parseFloat(costCell.textContent.replace('$', ''));

            // Gọi hàm cập nhật thành tiền cho hàng tương ứng
            updateSumCost(input, quantity, cost);
        }


            // Hàm cập nhật thành tiền
            function updateSumCost(input, quantity, cost) {
                var sumCostCell = input.closest('tr').querySelector('.cart__sumCost');
                var unitPrice = parseFloat(cost);
                var qty = parseInt(quantity);

                // Tính toán thành tiền
                var sumCost = unitPrice * qty;
                
                // Hiển thị giá trị với hai chữ số thập phân
                sumCostCell.textContent = '$' + sumCost.toFixed(2);

                // Cập nhật tổng thành tiền
                updateTotalCost();
            }

            // Hàm cập nhật tổng thành tiền
            function updateTotalCost() {
                var totalCostCell = document.querySelector('.cart__totalCost');
                var checkboxes = document.querySelectorAll('[name="isChoose"]');
                var sumCostCells = document.querySelectorAll('.cart__sumCost');

                var totalCost = 0;

                checkboxes.forEach(function(checkbox, index) {
                    if (checkbox.checked) {
                        // Nếu checkbox được chọn, thì cộng thêm thành tiền của sản phẩm đó vào tổng thành tiền
                        totalCost += parseFloat(sumCostCells[index].textContent.replace('$', ''), 10);
                    }
                });

                totalCostCell.textContent = '$' + totalCost.toFixed(2);
                return totalCost;
            }

            // Hàm cập nhật trạng thái "Chọn tất cả" dựa trên các checkbox khác
            function updateChooseAllCheckbox() {
                var chooseAllCheckbox = document.getElementById('cart__choose-all');
                var checkboxes = document.querySelectorAll('[name="isChoose"]');

                // Kiểm tra xem tất cả các checkbox khác có được chọn hay không
                var allChecked = Array.from(checkboxes).every(function(checkbox) {
                    return checkbox.checked;
                });

                // Cập nhật trạng thái "Chọn tất cả"
                chooseAllCheckbox.checked = allChecked;
            }

            // Thêm sự kiện click cho tất cả các checkbox
            var checkboxes = document.querySelectorAll('[name="isChoose"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('click', function () {
                    // Gọi hàm cập nhật tổng thành tiền
                    updateTotalCost();

                    // Gọi hàm cập nhật trạng thái "Chọn tất cả"
                    updateChooseAllCheckbox();

                    // Lấy cart_detail_id từ data attribute
                    var cartDetailId = this.getAttribute('data-cart-detail-id');

                    // Gọi phương thức cập nhật is_choose thông qua Ajax
                    updateIsChoose(cartDetailId, this.checked);
                });
            });

            // Thêm hàm gọi Ajax để cập nhật is_choose
            function updateIsChoose(cartDetailId, isChoose) {
                // Sử dụng thư viện Axios hoặc Fetch API để gửi request Ajax
                // Ví dụ sử dụng Axios
                axios.post('/cart/update-is-choose/' + cartDetailId, { is_choose: isChoose })
                    .then(function (response) {
                        // Xử lý phản hồi từ server nếu cần
                        console.log(response.data);
                    })
                    .catch(function (error) {
                        // Xử lý lỗi nếu có
                        console.error(error);
                    });
            }

            // Sự kiện click cho checkbox "Chọn tất cả"
            document.getElementById('cart__choose-all').addEventListener('click', function() {
                var chooseAllCheckbox = this;
                var isChooseAllChecked = chooseAllCheckbox.checked;

                // Lặp qua tất cả các checkbox và cập nhật trạng thái
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = isChooseAllChecked;
                });

                // Gọi hàm cập nhật tổng thành tiền khi có thay đổi
                updateTotalCost();
            });
               
            function deleteSelected() {
                var selectedIds = [];
                var isConfirmed = confirm('Bạn có chắc chắn muốn xóa hết khum?');
                if (isConfirmed){
                // Lấy các cart_detail_id đã được chọn
                    document.querySelectorAll('[name="isChoose"]:checked').forEach(function (checkbox) {
                        selectedIds.push(checkbox.getAttribute('data-cart-detail-id'));
                    });

                    // Cập nhật giá trị của selectedIds vào input ẩn trong form
                    document.getElementById('selectedIds').value = JSON.stringify(selectedIds);

                    // Gửi form để xóa đã chọn
                    document.getElementById('deleteSelectedForm').submit();
                }
            }
            function updateSelected() {
            var selectedIds = [];
            var quantities = {};
            var TotalCost = updateTotalCost();
            // Check if at least one item is selected
            var atLeastOneSelected = false;
            document.querySelectorAll('[name="isChoose"]:checked').forEach(function (checkbox) {
                atLeastOneSelected = true;
                selectedIds.push(checkbox.getAttribute('data-cart-detail-id'));

                // Lấy số lượng từ input số lượng tương ứng
                var quantityInputId = 'cart__quantity_' + checkbox.getAttribute('data-cart-detail-key'); 
                var quantityInput = document.getElementById(quantityInputId);
                var quantity = quantityInput ? quantityInput.value : null;
                
                quantities[checkbox.getAttribute('data-cart-detail-id')] = quantity;
            });

            // If at least one item is selected, proceed with the update
            if (atLeastOneSelected) {
                // Cập nhật giá trị của selectedIds và quantities vào input ẩn trong form
                document.getElementById('updateSelectedIds').value = JSON.stringify(selectedIds);
                document.getElementById('quantities').value = JSON.stringify(quantities);
                document.getElementById('totalCost').value = TotalCost;

                // Gửi form để cập nhật thông tin đã chọn
                document.getElementById('updateSelectedForm').submit();
            } else {
                // Show an alert or handle the case where no item is selected
                alert('Vui lòng chọn ít nhất một sản phẩm để mua hàng.');
            }
          }

        </script>
    </section>
@endsection
