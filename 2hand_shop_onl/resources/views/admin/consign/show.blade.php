@extends('layouts.app-admin')

@section('content')
    <div id="detail-consign" class="modal show detail_consign">
        <div class="modal__content" style="max-height: 100%;padding-bottom: 30px;">
            <form action="" class="form">
                <div class="modal__row">
                    <div class="modal__heading">Consign Information</div>
                    <a href="{{ route('admin.consign.index') }}" class="btn btn--text modal__btn">Back</a>
                </div>
                <div class="consign-detail__info">
                    <div class="consign-detail__info-wrap">
                        <span class="consign-detail__text">Customer:</span>
                        <p class="consign-detail__name">{{ $user->name }}</p>
                    </div>
                    <div class="consign-detail__info-wrap">
                        <span class="consign-detail__text">Consign ID:</span>
                        <p class="consign-detail__id">{{ $consign->consign_id }}</p>
                    </div>
                    <div class="consign-detail__info-wrap">
                        <span class="consign-detail__text">Address:</span>
                        <p class="consign-detail__address">KTX Khu B, Đông Hòa, Dĩ An</p>
                    </div>
                </div>
                <div class="modal__body">
                    <div class="form__row">
                        <div class="form-group">
                            <label for="phone" class="form__label">Phone</label>
                            <input type="tel" name="phone" value="{{ $customer->phone }}" class="form__input"
                                placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form__label">Price</label>
                            <input type="text" name="price" value="{{ $consign->cost }}" class="form__input"
                                placeholder="Price">
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="form-group">
                            <label for="bank" class="form__label">Bank</label>
                            <input type="text" name="bank" value="{{ $consign->bank_account }}" class="form__input"
                                placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="bank-num" class="form__label">Bank number</label>
                            <input type="number" name="bank-num" value="{{ $consign->bank_name }}" class="form__input"
                                placeholder="Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info" class="form__label form-label--block">Information</label>
                        <textarea class="form__textarea" name="info" id="info" cols="30" rows="6">{{ $consign->info }}</textarea>
                    </div>
                    <p class="consign-detail__label">Image</p>
                    <div class="consign-detail__list-img">
                        <img src="{{ asset('images/product-item-1.png') }}" alt="" class="consign-detail__img">
                        <img src="{{ asset('images/product-item-1.png') }}" alt="" class="consign-detail__img">
                        <img src="{{ asset('images/product-item-1.png') }}" alt="" class="consign-detail__img">
                        <img src="{{ asset('images/product-item-1.png') }}" alt="" class="consign-detail__img">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
