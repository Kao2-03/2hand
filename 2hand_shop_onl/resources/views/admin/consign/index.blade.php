@extends('layouts.app-admin')

@section('content')
    <section class="consign-mnm">
        <div id="consign-filter" class="consign-mnm-top">
            <button class="consign-mnm__tab consign-mnm__tab--active" data-filter="all">All</button>
            <button class="consign-mnm__tab" data-filter="pending">Pending</button>
            <button class="consign-mnm__tab" data-filter="confirm">Confirmed</button>
            <button class="consign-mnm__tab" data-filter="cancel">Cancellation</button>
        </div>
        <div class="consign-mnm-wrap">
            <div class="consign-mnm__search-wrap">
                <select name="" id="" class="consign-mnm__selected">
                    <option value="">Consignment Number</option>
                </select>
                <input type="text" name="" id="" class="consign-mnm__search"
                    placeholder="Filter consignment">
                <svg class="consign-mnm__search-icon" width="21" height="20" viewBox="0 0 21 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.344 19L15.094 14.7425M17.454 9.0526C17.454 11.1883 16.604 13.2365 15.094 14.7467C13.584 16.2569 11.534 17.1053 9.39404 17.1053C7.26404 17.1053 5.21398 16.2569 3.70398 14.7467C2.19398 13.2365 1.34399 11.1883 1.34399 9.0526C1.34399 6.9169 2.19398 4.8687 3.70398 3.3586C5.21398 1.8484 7.26404 1 9.39404 1C11.534 1 13.584 1.8484 15.094 3.3586C16.604 4.8687 17.454 6.9169 17.454 9.0526Z"
                        stroke="#000" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
            <button class="btn consign-mnm__btn">Search</button>
            <button class="btn btn--outline consign-mnm__btn">Reset</button>
        </div>
        <div class="consign-mnm-wrap consign-mnm-wrap--mt">
            <p class="consign-mnm__text">Consign date</p>
            <div class="consign-mnm-wrap consign-mnm-wrap--before">
                <input type="date" name="consign-date" id="start" class="consign-mnm__date">
                <input type="date" name="consign-date" id="end" class="consign-mnm__date">
            </div>
        </div>
        <p class="consign-mnm__heading">{{ $consigns_count }} Consignments</p>
        <div class="consign-head consign-mnm__head">
            <p class="consign-head__desc">Customer</p>
            <p class="consign-head__desc">Price Setter</p>
            <p class="consign-head__desc">Price</p>
            <p class="consign-head__desc">Status</p>
            <p class="consign-head__desc">Action</p>
        </div>
        <div class="consign-list">
            @foreach ($consigns as $consign)
                <form action="{{ route('admin.consign.update', $consign->consign_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="consign-item" data-state="{{ $consign->status }}">
                        <div class="consign__name-wrapper">
                            <div class="consign-mnm__header">
                                <p class="consign__name">{{ $consign->user->name }}</p>
                            </div>
                            <p class="consign__id" style="margin-left: 0">Consign Id: {{ $consign->consign_id }}</p>
                        </div>
                        <p class="consign__setter">{{ $consign->who_decide }}</p>
                        <span class="consign__price">{{ $consign->cost }} VNĐ</span>
                        <div class="consign__{{ $consign->status }}">{{ $consign->status }}</div>
                        <div class="consign-mnm-cta">
                            @if ($consign->status == 'pending')
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
                            <a href="{{ route('admin.consign.show', $consign->consign_id) }}" class="consign-mnm__icon">
                                <img src="{{ asset('icons/detail.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </form>

                {{-- Modal Delete --}}
                <div id="delete-consign" class="modal hide">
                    <div class="modal__content delete-consign__content">
                        <form action="{{ route('admin.consign.delete', $consign->consign_id) }}" method="POST"
                            class="form">
                            @csrf
                            @method('DELETE')
                            <p class="consign__name">Bạn có chắc chắn muốn xóa?</p>
                            <div class="consign-mnm-cta delete-consign-cta">
                                <button class="btn consign-delete__btn-delete">Delete</button>
                                <button class="btn btn--text consign-delete__btn-cancel js-toggle"
                                    toggle-target="#delete-consign">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal__overlay js-toggle" toggle-target="#delete-consign"></div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        const $1 = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const filterList = $1("#consign-filter");
        const filterButtons = filterList.querySelectorAll(".consign-mnm__tab");
        const consignItems = $$(".consign-item");

        filterButtons.forEach((button) => {
            button.addEventListener("click", (e) => {
                const filter = e.target.getAttribute('data-filter');

                updateActiveButton(e.target);
                filterConsigns(filter);
            });
        });

        function updateActiveButton(newButton) {
            filterList
                .querySelector('.consign-mnm__tab--active')
                .classList.remove('consign-mnm__tab--active');
            newButton.classList.add("consign-mnm__tab--active");
        }

        function filterConsigns(consignFilter) {
            consignItems.forEach(item => {
                const consState = item.getAttribute('data-state');

                if (consignFilter === 'all' || consignFilter === consState) {
                    item.classList.remove('consign--hide');
                } else {
                    item.classList.add('consign--hide');
                }
            });
        }

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
