@extends('layouts.app')

@section('content')
    <section class="consign">
        <div class="container">
            <p class="section-heading consign__heading">Consignment</p>
            <form action="{{ route('consign.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="consign__inner">
                    <div class="consign-left">
                        <div class="consign__row">
                            <div class="form-group">
                                <label for="name" class="form__label">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="Name"
                                    class="form__input">
                            </div>

                            <div class="form-group">
                                <label for="email" class="form__label">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Email"
                                    class="form__input">
                            </div>
                        </div>

                        <div class="consign__row">
                            <div class="form-group">
                                <label for="address" class="form__label">Address</label>
                                <input type="text" name="address" value="{{ $address->address_detail }}"
                                    placeholder="Address" class="form__input">
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form__label">Phone</label>
                                <input type="tel" name="phone" value="{{ $customer->phone }}" placeholder="Phone"
                                    class="form__input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="info" class="form__label">Info Product</label>
                            <textarea name="info" cols="30" rows="4" placeholder="Info Product" class="consign__info"></textarea>
                        </div>

                        <div class="form-group consign-wrapper">
                            <input type="file" name="image" class="upload__img" multiple>
                            <div class="consign__img"></div>
                        </div>
                    </div>

                    <div class="consign-right">
                        <div class="form-group ">
                            <label for="bank" class="form__label">Bank</label>
                            <input type="text" name="bank" placeholder="Bank" class="form__input">
                        </div>
                        <div class="form-group consign-wrapper">
                            <label for="number" class="form__label">Number</label>
                            <input type="text" name="number" placeholder="Number" class="form__input">
                        </div>

                        <div class="consign-row">
                            <div class="consign__check-wrapper">
                                <input type="radio" name="setter" id="customer" value="customer" class="consign__check">
                                <label for="customer">Khách tự đưa giá</label>
                            </div>
                            <div class="consign__check-wrapper">
                                <input type="radio" name="setter" id="shop" value="shop" class="consign__check">
                                <label for="shop">Shop đưa giá</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form__label">Price</label>
                            <input type="number" name="price" placeholder="Price" class="form__input">
                        </div>
                        <div class="consign__btn-wrapper">
                            <button class="btn consign__btn  consign__btn--text">Clear</button>
                            <button type="submit" class="btn consign__btn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            <p class="section-heading consign__heading">Consignment List</p>
            <div class="consign-head">
                <p class="consign-head__desc">Consign ID</p>
                <p class="consign-head__desc">Price Setter</p>
                <p class="consign-head__desc">Price</p>
                <p class="consign-head__desc">Status</p>
                <p class="consign-head__desc">Action</p>
            </div>
            <div class="consign__list">
                @foreach ($consigns as $consign)
                    <div class="consign-item">
                        <div class="consign__name-wrapper">
                            <p class="consign__id">{{ $consign->consign_id }}</p>
                        </div>
                        <p class="consign__setter">{{ $consign->who_decide }}</p>
                        <span class="consign__price">{{ $consign->cost }} VNĐ</span>

                        @if ($consign->status == 'pending')
                            <div class="consign__pending">Pending</div>
                        @else
                            <div class="consign__confirm">Confirm</div>
                        @endif

                        <form method="POST" action="{{ route('consign.delete', $consign->consign_id) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="consign-action">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="6" fill="#C01616"
                                        fill-opacity="0.3" />
                                    <path
                                        d="M17.2533 10.2706L16.2779 11.6775H23.7221L22.7467 10.2706C22.6696 10.1616 22.5413 10.0923 22.4027 10.0923H17.5922C17.4536 10.0923 17.3252 10.1567 17.2482 10.2706H17.2533ZM24.8002 8.95285L26.6844 11.6775H27.3929H29.8571H30.2679C30.9507 11.6775 31.5 12.2076 31.5 12.8665C31.5 13.5254 30.9507 14.0555 30.2679 14.0555H29.8571V29.1156C29.8571 31.3052 28.0192 33.0788 25.75 33.0788H14.25C11.9808 33.0788 10.1429 31.3052 10.1429 29.1156V14.0555H9.73214C9.04933 14.0555 8.5 13.5254 8.5 12.8665C8.5 12.2076 9.04933 11.6775 9.73214 11.6775H10.1429H12.6071H13.3156L15.1998 8.9479C15.7337 8.18003 16.6321 7.71436 17.5922 7.71436H22.4027C23.3627 7.71436 24.2612 8.18003 24.7951 8.9479L24.8002 8.95285ZM12.6071 14.0555V29.1156C12.6071 29.9924 13.3413 30.7008 14.25 30.7008H25.75C26.6587 30.7008 27.3929 29.9924 27.3929 29.1156V14.0555H12.6071ZM16.7143 17.226V27.5303C16.7143 27.9662 16.3446 28.3229 15.8929 28.3229C15.4411 28.3229 15.0714 27.9662 15.0714 27.5303V17.226C15.0714 16.7901 15.4411 16.4334 15.8929 16.4334C16.3446 16.4334 16.7143 16.7901 16.7143 17.226ZM20.8214 17.226V27.5303C20.8214 27.9662 20.4518 28.3229 20 28.3229C19.5482 28.3229 19.1786 27.9662 19.1786 27.5303V17.226C19.1786 16.7901 19.5482 16.4334 20 16.4334C20.4518 16.4334 20.8214 16.7901 20.8214 17.226ZM24.9286 17.226V27.5303C24.9286 27.9662 24.5589 28.3229 24.1071 28.3229C23.6554 28.3229 23.2857 27.9662 23.2857 27.5303V17.226C23.2857 16.7901 23.6554 16.4334 24.1071 16.4334C24.5589 16.4334 24.9286 16.7901 24.9286 17.226Z"
                                        fill="#C01616" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
