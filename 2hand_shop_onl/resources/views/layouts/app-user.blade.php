<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2Hand Shop</title>

    {{-- Embed Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Roboto+Slab:wght@700&display=swap"
        rel="stylesheet">

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- ------------------ Header ------------------ --}}
    <header class="header">
        <div class="container">
            <div class="header-row">
                <div class="header__logo-wrap">
                    <a href="/" class="header__name">
                        2Hand
                    </a>
                </div>
                <div class="header-search">
                    <input type="text" name="" id="" placeholder="Search for anything"
                        class="header__input">
                    <img src="{{ asset('icons/search.svg') }}" alt="Search" class="header-search__icon">
                </div>

                <div class="header-user">
                    @guest
                        @if (Route::has('login'))
                            <div>
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-sign btn-sign-up">Đăng ký</a>
                                    @endif
                                    <a href="{{ route('login') }}" class="btn btn-sign btn-sign-in">Đăng nhập</a>
                                @endauth
                            </div>
                        @endif
                    @else
                        <div class="header-user__wishlist">
                            <a href="wishlist">
                                <img src="{{ asset('icons/wishlist.svg') }}" alt="" class="header-user__icon">
                            </a>
                            <span class="header__wishlist__qnt">(0)</span>
                        </div>
                        <div class="header-user__cart">
                            <a href="{{ route('cart.index') }}">
                                <img src="{{ asset('icons/cart.svg') }}" alt="" class="header-user__icon">
                            </a>
                            <span class="header__cart__qnt">(0)</span>
                        </div>
                        <div class="header-user__info">
                            <a href="#" class="btn-user">
                                <img src="{{ asset('icons/user.svg') }}" alt="" class="header-user__icon">
                            </a>
                        </div>

                        <div id="dropdown" class="header-user__dropdown hide">
                            <div class="header-user__dropdown-wrap">
                                <a class="user__link" href="{{ route('user.purchase') }}">Tài khoản</a>
                                <div class="separate"></div>
                                <a class="user__link" class="" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
            <navbar class="nav">
                <div class="nav-wrap">
                    <a href="/" class="nav__link">Trang chủ</a>
                </div>
                <div class="nav-wrap">
                    <a href="{{ route('products.index') }}" class="nav__link">Sản phẩm</a>
                </div>
                <div class="nav-wrap">
                    <a href="{{ route('blogs.index') }}" class="nav__link">Blog</a>
                </div>
                <div class="nav-wrap">
                    <a href="{{ route('consign.create') }}" class="nav__link">Ký gửi</a>
                </div>
                <div class="nav-wrap">
                    <a href="{{ route('admin.home') }}" class="nav__link">Admin</a>
                </div>
            </navbar>
        </div>
    </header>

    <section class="user">
        <div class="container user-container">
            <div class="user__inner">
                {{-- ------------- User Sidebar ------------- --}}
                <div class="user-sidebar">
                    <div class="user__header">
                        <input type="file" id="uploadInput" style="display:none;" name="avatar">
                        {{-- <img src="{{ asset($customer->avatar) }}" alt="" class="user__avatar" --}}
                        <img src="{{ asset('images/default.jpg') }}" alt="" class="user__avatar"
                            id = "user__avatar" onclick="uploadInput()">
                        {{-- <button type="submit">Update</button> --}}
                        {{-- <p class="section-title user__name" id="user-name-sidebar">{{ $user->name }}</p>
                        <p class="user__register" id="user-create">Registered: {{ $user_create }}</p> --}}
                    </div>

                    <div class="menus">
                        {{-- Menu 1 --}}
                        <div class="menu">
                            <p class="menu__title">My Account</p>
                            <a href="{{ route('user.info') }}" class="menu-wrapper">
                                <img src="{{ asset('icons/profile.svg') }}" alt="" class="menu__icon">
                                <p class="menu__link menu__link--active">Information</p>
                            </a>
                            <a href="{{ route('user.address.index') }}" class="menu-wrapper">
                                <img src="{{ asset('icons/location.svg') }}" alt="" class="menu__icon">
                                <p class="menu__link">Address</p>
                            </a>
                            <a href="{{ route('user.bank') }}" class="menu-wrapper">
                                <img src="{{ asset('icons/bank.svg') }}" alt="" class="menu__icon">
                                <p class="menu__link">Bank</p>
                            </a>
                        </div>

                        {{-- Menu 2 --}}
                        <div class="menu">
                            <p class="menu__title">My items</p>
                            <a href="{{ url('user/purchase') }}" class="menu-wrapper">
                                <img src="{{ asset('icons/order.svg') }}" alt="" class="menu__icon">
                                <p class="menu__link">Order</p>
                            </a>
                            <a href="#!" class="menu-wrapper">
                                <img src="{{ asset('icons/voucher.svg') }}" alt="" class="menu__icon">
                                <p class="menu__link">Voucher</p>
                            </a>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </section>

    {{-- ------------------ Footer ------------------ --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-separate"></div>
            <div class="footer__list">
                <div class="footer__column section-desc">
                    <p class="section-title footer__title">Customer Service</p>
                    <a href="#!" class="footer__link">Contact Us</a>
                    <a href="#!" class="footer__link">FAQs</a>
                    <a href="#!" class="footer__link">Order Lookup</a>
                    <a href="#!" class="footer__link">Shipping & Delivery</a>
                    <a href="#!" class="footer__link">Privacy Policy</a>
                </div>
                <div class="footer__column section-desc">
                    <p class="section-title footer__title">About us</p>
                    <a href="#!" class="footer__link">Careers</a>
                    <a href="#!" class="footer__link">News & Blog</a>
                    <a href="#!" class="footer__link">Investors</a>
                </div>
                <div class="footer__column section-desc">
                    <p class="section-title footer__title">Credit Card</p>
                    <a href="#!" class="footer__link">Gift Cards</a>
                    <a href="#!" class="footer__link">Gift Cards Balance</a>
                    <a href="#!" class="footer__link">Shop with Points</a>
                    <a href="#!" class="footer__link">Reload Your Balance</a>
                </div>
                <div class="footer__column section-desc">
                    <p class="section-title footer__title">Sell</p>
                    <a href="#!" class="footer__link">Start Selling</a>
                    <a href="#!" class="footer__link">Learn to Sell</a>
                    <a href="#!" class="footer__link">Affiliates & Partners</a>
                </div>
                <div class="footer__column">
                    <p class="section-title footer__title">Follow us</p>
                    <div class="footer-wrap__icon">
                        <a href="#!" class="footer__icon">
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.14269 13.8502V7.03605H7.19067L7.46214 4.63778H5.14269L5.14613 3.43734C5.14613 2.81181 5.20948 2.4768 6.16733 2.4768H7.44778V0.078125H5.39934C2.9388 0.078125 2.07289 1.24149 2.07289 3.19818V4.63796H0.539062V7.03645H2.07289V13.7536C2.67043 13.8653 3.28818 13.9243 3.92069 13.9243C4.3293 13.9243 4.73748 13.8996 5.14269 13.8502Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <a href="#!" class="footer__icon">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.0761719 1.68652C0.0761719 1.22031 0.239898 0.835691 0.567336 0.53267C0.894774 0.229636 1.32046 0.078125 1.84436 0.078125C2.35892 0.078125 2.77523 0.2273 3.09332 0.525677C3.42076 0.83337 3.58449 1.23429 3.58449 1.72847C3.58449 2.17603 3.42545 2.54898 3.10736 2.84736C2.77992 3.15505 2.34956 3.30889 1.8163 3.30889H1.80226C1.28771 3.30889 0.871395 3.15505 0.553303 2.84736C0.235211 2.53966 0.0761719 2.15271 0.0761719 1.68652ZM0.258604 13.9243V4.58162H3.37399V13.9243H0.258604ZM5.10008 13.9243H8.21546V8.7075C8.21546 8.38115 8.25289 8.1294 8.32773 7.95225C8.4587 7.63523 8.65751 7.36716 8.92414 7.14806C9.19078 6.92894 9.52523 6.81938 9.92752 6.81938C10.9753 6.81938 11.4992 7.52334 11.4992 8.93127V13.9243H14.6146V8.56764C14.6146 7.18768 14.2872 6.14106 13.6323 5.42778C12.9774 4.71449 12.112 4.35785 11.0362 4.35785C9.82929 4.35785 8.88906 4.87533 8.21546 5.91029V5.93827H8.20143L8.21546 5.91029V4.58162H5.10008C5.11879 4.87999 5.12815 5.80772 5.12815 7.36484C5.12815 8.92194 5.11879 11.1084 5.10008 13.9243Z"
                                    fill="white" />
                            </svg>
                        </a>
                        <a href="#!" class="footer__icon">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 1.7173C17.3306 1.99528 16.6174 2.17954 15.8737 2.26901C16.6388 1.83659 17.2226 1.15706 17.4971 0.338007C16.7839 0.74061 15.9964 1.02499 15.1571 1.18369C14.4799 0.500965 13.5146 0.078125 12.4616 0.078125C10.4186 0.078125 8.77387 1.64807 8.77387 3.57268C8.77387 3.8496 8.79862 4.11588 8.85938 4.36937C5.7915 4.22771 3.07687 2.83564 1.25325 0.715048C0.934875 1.23801 0.748125 1.83659 0.748125 2.48097C0.748125 3.69091 1.40625 4.76345 2.38725 5.3844C1.79437 5.37375 1.21275 5.21079 0.72 4.9541C0.72 4.96475 0.72 4.9786 0.72 4.99244C0.72 6.6902 1.99912 8.10037 3.6765 8.42523C3.37612 8.50298 3.04875 8.54025 2.709 8.54025C2.47275 8.54025 2.23425 8.52747 2.01038 8.48061C2.4885 9.86416 3.84525 10.8813 5.4585 10.9143C4.203 11.8442 2.60888 12.4044 0.883125 12.4044C0.5805 12.4044 0.29025 12.3916 0 12.3565C1.63462 13.3545 3.57188 13.9243 5.661 13.9243C12.4515 13.9243 16.164 8.59883 16.164 3.98274C16.164 3.8283 16.1584 3.67919 16.1505 3.53114C16.8829 3.03907 17.4982 2.42452 18 1.7173Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>
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

</html>
