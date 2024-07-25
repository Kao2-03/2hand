@extends('layouts.app-user')

@section('content')
    <div id="add-address" class="modal show add-address">
        <div class="modal__content">
            <form action="{{ route('user.address.store') }}" method="POST" class="form" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                <div class="modal__row" style="border: none">
                    <div class="modal__heading">Add Address</div>
                </div>
                <div class="modal__body">
                    <div class="form__row">
                        <div class="form-group">
                            <label for="name" class="form__label">Name</label>
                            <input type="text" name="name" class="form__input" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form__label">Phone</label>
                            <input type="tel" name="phone" class="form__input" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="form-group">
                            <label for="province" class="form__label">Province</label>
                            <select class="form__input" name="province">
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}">{{ $province->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district" class="form__label">District</label>
                            <select class="form__input" name="district">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->code }}">{{ $district->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="form-group">
                            <label for="ward" class="form__label">Ward</label>
                            <select class="form__input" name="ward">
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->code }}">{{ $ward->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address_detail" class="form__label">Address Detail</label>
                            <input type="text" name="address_detail" class="form__input" placeholder="Address Detail">
                        </div>
                    </div>
                </div>
                <div class="modal__bottom">
                    <button type="submit" class="btn modal__btn">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
