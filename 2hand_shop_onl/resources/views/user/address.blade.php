@extends('layouts.app')

@section('content')
    <div class="container user-container">
        <div class="user__inner">
            {{-- ------------- User Sidebar ------------- --}}
            <div class="user-sidebar">
                <div class="user__header">
                    <input type="file" id="uploadInput" style="display:none;" name="avatar">
                    {{-- <img src="{{ asset($customer->avatar) }}" alt="" class="user__avatar" --}}
                    <img src="" alt="" class="user__avatar" id = "user__avatar" onclick="uploadInput()">
                    {{-- <button type="submit">Update</button> --}}
                    <p class="section-title user__name" id="user-name-sidebar">{{ $user->name }}</p>
                    <p class="user__register" id="user-create">Registered: {{ $user_create }}</p>
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
                        <a href="{{ url('/user/bank') }}" class="menu-wrapper">
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
            <div class="user-address">
                <div class="user-wrapper" style="margin-top: 0">
                    <p class="user__heading">Address</p>
                    <a href="{{ route('user.address.create') }}" class="btn user-address__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                            <rect x="7" width="12" height="2" transform="rotate(90 7 0)" fill="white" />
                            <rect x="12" y="7" width="12" height="2" transform="rotate(-180 12 7)" fill="white" />
                        </svg>
                        Add new address
                    </a>
                </div>
                <div class="user__separate user__separate--mg"></div>
                @foreach ($addresses as $address)
                    <div class="user-wrapper">
                        <div>
                            <p class="user-address__desc">
                                {{ $address->address_detail }}, {{ $address->ward->name_en }},
                                {{ $address->district->name_en }}, {{ $address->province->name_en }}
                            </p>
                            <p class="user-address__default">Default</p>
                        </div>
                        <div class="user-address-group">
                            <div class="address__row">
                                <a href="{{ route('user.address.edit', $address->address_id) }}"
                                    class="user-address__link">Update</a>
                                {{-- <form action="{{ route('user.address.delete', $address->address_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="user-address__link"
                                        style="font-weight: 500">Delete</button>
                                </form> --}}
                                <button class="user-address__link js-toggle" onclick="initJsToggle()"
                                    toggle-target="#delete-address" style="font-weight: 500">Delete</button>
                            </div>
                            <button class="btn user-address__set">Set default</button>
                        </div>
                    </div>
                    <div class="user__separate"></div>

                    {{-- Modal Delete --}}
                    <div id="delete-address" class="modal hide">
                        <div class="modal__content delete-consign__content">
                            <form action="{{ route('user.address.delete', $address->address_id) }}" method="POST"
                                class="form">
                                @csrf
                                @method('DELETE')
                                <p class="consign__name">Bạn có chắc chắn muốn xóa?</p>
                                <div class="consign-mnm-cta delete-consign-cta">
                                    <button class="btn consign-delete__btn-delete">Delete</button>
                                    <button class="btn btn--text consign-delete__btn-cancel js-toggle"
                                        toggle-target="#delete-address">Cancel</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal__overlay js-toggle" toggle-target="#delete-address"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addr = document.getElementById('address-default');
        });

        const $1 = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        function initJsToggle() {
            $$(".js-toggle").forEach((button) => {
                const target = button.getAttribute("toggle-target");

                button.addEventListener("click", (e) => {
                    e.preventDefault();

                    const isHidden = $1(target).classList.contains("hide");

                    requestAnimationFrame(() => {
                        $1(target).classList.toggle("hide", !isHidden);
                        $1(target).classList.toggle("show", isHidden);
                    });
                });

                document.addEventListener("click", (e) => {
                    if (!e.target.closest(target)) {
                        const isHidden = $1(target).classList.contains("hide");
                        if (!isHidden) {
                            button.click();
                        }
                    }
                });
            });
        }
    </script>
@endsection
