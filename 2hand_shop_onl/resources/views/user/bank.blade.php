@extends('layouts.app-user')

@section('content')
    {{-- ------------- User Bank ------------- --}}
    <div class="user-bank">
        <p class="user__heading">My Wallet</p>
        <div class="user__separate"></div>
        <div class="card">
            {{-- Card 1 --}}
            <div class="card__inner">
                <img src="{{ asset('images/bank-1.png') }}" alt="" class="card__img">
                <span class="card__number">1234 4567 8901 2221</span>
                <div class="card-wrapper">
                    <div class="card-item">
                        <p class="card-item__label">Card Holder</p>
                        <p class="card-item__name">Imran Khan</p>
                    </div>
                    <div class="card-item">
                        <p class="card-item__label">Expired</p>
                        <p class="card-item__name">10/22</p>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="card__inner">
                <img src="{{ asset('images/bank-2.png') }}" alt="" class="card__img">
                <span class="card__number">1234 4567 8901 2221</span>
                <div class="card-wrapper">
                    <div class="card-item">
                        <p class="card-item__label">Card Holder</p>
                        <p class="card-item__name">Imran Khan</p>
                    </div>
                    <div class="card-item">
                        <p class="card-item__label">Expired</p>
                        <p class="card-item__name">11/22</p>
                    </div>
                </div>
            </div>

            <div class="card__inner card__inner--empty">
                <div>
                    <img src="{{ asset('icons/add-border.svg') }}" alt="">
                    <p class="card__add">Add new Bank</p>
                </div>
            </div>
        </div>
    </div>
@endsection
