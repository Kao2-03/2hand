@extends('layouts.app-user')

@section('content')
    {{-- ------------- User Address ------------- --}}
    <form action="{{ route('user.edit', $user->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="user-content">
            <p class="user__heading">Thông tin</p>
            <p class="user__desc">Thông tin tài khoản, khách hàng và liện hệ</p>
            <div class="user__separate"></div>
            <div class="user-group">
                <label for="name" class="user-group__label">Name</label>
                <input type="text" name="name" id="name-user" placeholder="Name" class="user-group__input"
                    value="{{ $user->name }}">
                {{-- <a href="#!" class="user-group__link" id="change-name">Change</a> --}}
            </div>
            <div class="user-group">
                <label for="" class="user-group__label">Email</label>
                {{-- <p id="email-user" class="user-group__label">nguyen***A@gmail.com</p> --}}
                <input type="text" name="email" id="email-user" placeholder="Email" class="user-group__input"
                    value="{{ $user->email }}">
                {{-- <a id="change-email" href="#!" class="user-group__link">Change</a> --}}
            </div>
            <div class="user-group">
                <label for="" class="user-group__label">Phone</label>
                <input type="text" name="phone" id="phone-user" placeholder="Phone" class="user-group__input"
                    value="{{ $customer->phone }}">
                {{-- <p class="user-group__phone"></p> --}}
                {{-- <a href="#!" class="user-group__link" id="change-phone">Change</a> --}}
            </div>
            <div class="user-group">
                <label for="" class="user-group__label">Gender</label>
                <input type="radio" name="gender" id="male" value="male"
                    {{ $customer->gender === 'male' ? 'checked' : '' }}>
                <label for="male" class="user-group__label">Male</label>
                <input type="radio" name="gender" id="female" value="female"
                    {{ $customer->gender === 'female' ? 'checked' : '' }}>
                <label for="female" class="user-group__label">Female</label>
            </div>
            <div class="user-group">
                <label for="" class="user-group__label">Date of Birth</label>
                <select name="year" id="year" class="user-group__select">
                    <option value="Year">Year</option>
                    @if ($customer->birth)
                        @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                            <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    @endif
                </select>
                <select name="month" id="month" class="user-group__select">
                    <option value="Month">Month</option>
                    @if ($customer->birth)
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    @endif
                </select>
                <select name="day" id="day" class="user-group__select">
                    <option value="Day">Day</option>
                    @if ($customer->birth)
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" {{ $day == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    @endif
                </select>
            </div>
            <button type="submit" class="btn user__save">Save</button>
        </div>


    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var daySelect = document.getElementById('day');
            var monthSelect = document.getElementById('month');
            var yearSelect = document.getElementById('year');

            // Hàm để cập nhật số ngày trong tháng dựa trên tháng và năm
            function updateDays() {
                var selectedMonth = monthSelect.value;
                var selectedYear = yearSelect.value;

                // Xóa tất cả các option hiện tại trong ngày
                daySelect.innerHTML = '<option value="">Day</option>';

                if (selectedMonth !== '' && selectedYear !== '') {
                    var daysInMonth = new Date(selectedYear, selectedMonth, 0).getDate();

                    // Tạo các option từ 1 đến số ngày trong tháng
                    for (var i = 1; i <= daysInMonth; i++) {
                        var option = document.createElement('option');
                        option.value = i;
                        option.text = i;
                        daySelect.add(option);
                    }
                }
            }

            // Hàm để cập nhật số ngày khi tháng hoặc năm thay đổi
            monthSelect.addEventListener('change', updateDays);
            yearSelect.addEventListener('change', updateDays);

            // Tạo option cho tháng và năm
            for (var i = 1; i <= 12; i++) {
                var optionMonth = document.createElement('option');
                optionMonth.value = i;
                optionMonth.text = i;
                monthSelect.add(optionMonth);
            }

            var currentYear = new Date().getFullYear();
            for (var i = currentYear; i >= currentYear - 100; i--) {
                var optionYear = document.createElement('option');
                optionYear.value = i;
                optionYear.text = i;
                yearSelect.add(optionYear);
            }

        });

        document.addEventListener('DOMContentLoaded', function() {
            var userAvatar = document.getElementById('user__avatar');
            var uploadInput = document.getElementById('uploadInput');

            userAvatar.addEventListener('click', function() {
                // Trigger click on the hidden file input
                uploadInput.click();
            });

            uploadInput.addEventListener('change', function() {
                var fileInput = this;
                var file = fileInput.files[0];

                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imageURL = e.target.result;
                        console.log("Đường dẫn ảnh đã chọn: " + imageURL);
                        userAvatar.src = imageURL;

                        // Create a new file input and replace the old one
                        var newInput = document.createElement('input');
                        newInput.type = 'file';
                        newInput.style.display = 'none';
                        newInput.name = 'avatar';

                        // Copy the attributes and add a new change event listener
                        Array.from(uploadInput.attributes).forEach(function(attr) {
                            newInput.setAttribute(attr.name, attr.value);
                        });

                        // Replace the old input with the new one
                        fileInput.parentNode.replaceChild(newInput, fileInput);

                        // Add event listener to the new input
                        newInput.addEventListener('change', function() {
                            // Continue with the change event logic as needed
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
