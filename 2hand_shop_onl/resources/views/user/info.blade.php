@extends('layouts.app-user')

@section('content')
    {{-- ------------- User Address ------------- --}}
    <div class="user-content">
        <p class="user__heading">Thông tin</p>
        <p class="user__desc">Thông tin tài khoản, khách hàng và liện hệ</p>
        <div class="user__separate"></div>
        <div class="user-group">
            <label for="name" class="user-group__label">Name</label>
            <input type="text" name="name" id="name-user" placeholder="Name" class="user-group__input" value="{{ $user->name }}">
            {{-- <a href="#!" class="user-group__link" id="change-name">Change</a> --}}
        </div>
        <div class="user-group">
            <label for="" class="user-group__label">Email</label>
            {{-- <p id="email-user" class="user-group__label">nguyen***A@gmail.com</p> --}}
            <input type="text" name="email" id="email-user" placeholder="Email" class="user-group__input" value="{{ $user->email }}">
            {{-- <a id="change-email" href="#!" class="user-group__link">Change</a> --}}
        </div>
        <div class="user-group">
            <label for="" class="user-group__label">Phone</label>
            <input type="text" name="phone" id="phone-user" placeholder="Phone" class="user-group__input" value="{{ $customer->phone }}">
            {{-- <p class="user-group__phone"></p> --}}
            {{-- <a href="#!" class="user-group__link" id="change-phone">Change</a> --}}
        </div>
        <div class="user-group">
            <label for="" class="user-group__label">Gender</label>
            <input type="radio" name="gender" id="male" value="male" disabled {{  $customer->gender === 'male' ? 'checked' : ''  }} >
            <label for="male" class="user-group__label">Male</label>
            <input type="radio" name="gender" id="female" value="female" disabled {{  $customer->gender === 'female' ? 'checked' : ''  }} >
            <label for="female" class="user-group__label">Female</label>
        </div>
        <div class="user-group">
            <label for="" class="user-group__label">Date of Birth</label>
            <select disabled name="year" id="year" class="user-group__select">
                <option value="Year">Year</option>
                @if ($customer->birth)
                @for ($i = date("Y"); $i >= date("Y") - 100; $i--)
                <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
                @endif
            </select>
            <select disabled name="month" id="month" class="user-group__select">
                <option value="Month">Month</option>
                @if ($customer->birth)
                @for ($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
                @endif
            </select>
            <select disabled name="day" id="day" class="user-group__select">
                <option value="Day">Day</option>
                @if ($customer->birth)
                @for ($i = 1; $i <= 31; $i++)
                <option value="{{ $i }}" {{ $day == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
                @endif
            </select>
        </div>
        <a href="{{ route('user.edit', $user->id) }}" class="btn user__btn">Change Information</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var name = document.getElementById('name-user');
        var email = document.getElementById('email-user');
        var phone = document.getElementById('phone-user');
        email.setAttribute('readonly', 'readonly');
        name.setAttribute('readonly', 'readonly');
        phone.setAttribute('readonly', 'readonly');
        
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
    
    </script>
@endsection
