@extends('layouts.app-admin')

@section('content')
    <section class="sale_analysis-section">
        <div class="container">
            <div class="sale_analysis-block1">
                <div class="sale_analysis-block1__Datetime">
                    <h1>Time</h1>
                    <a class="sale_analysis-block1__Datetime-show">
                        <img src="http://localhost:8000/icons/calendar1.svg" alt="error" class="sale_analysis-block1__Datetime-show-calendar-icon">
                        <h2 class="sale_analysis-block1__Datetime-show-chooseDate">Date:</h2>
                        <h2 class="sale_analysis-block1__Datetime-show-chooseDate">13/11/2023</h2>
                        <img src="http://127.0.0.1:8000/icons/arrow-up.svg" alt="error" class="sale_analysis-block1__Datetime-show-chooseDate_menu">
                    </a>
                </div>
                
                <div class="sale_analysis-block1__Status-Order">
                    <h1>Order Type</h1>
                        <select name="Option" class="sale_analysis-block1__Status-Order_dropdown">
                            <option value="co"><h2>Confirmed Order</h2></option>
                            <option value="po"><h2>Paid Order</h2></option>
                            <option value="do"><h2>Delivered Order</h2></option>
                        </select>      
                </div>            
            </div>
            <div class="sale_analysis-block2">
                <h1 class="sale_analysis-block2-title1">Overview</h1>
                <div class="sale_analysis-block2-list">
                    <div class="sale_analysis-block2-list-square">
                        <p class="sale_analysis-block2-list-square-title">Revenue</p>
                        <p class="sale_analysis-block2-list-square-number"><sub>đ</sub>0</p>
                    </div>
                    <div class="sale_analysis-block2-list-square">
                        <p class="sale_analysis-block2-list-square-title">Order</p>
                        <p class="sale_analysis-block2-list-square-number">0</p>
                    </div>
                    <div class="sale_analysis-block2-list-square">
                        <p class="sale_analysis-block2-list-square-title">Exchange Rate</p>
                        <p class="sale_analysis-block2-list-square-number">0.00%</p>
                    </div>
                    <div class="sale_analysis-block2-list-square">
                        <p class="sale_analysis-block2-list-square-title">Visit</p>
                        <p class="sale_analysis-block2-list-square-number">0</p>
                    </div>
                    <div class="sale_analysis-block2-list-square">
                        <p class="sale_analysis-block2-list-square-title">Revenue Per Order</p>
                        <p class="sale_analysis-block2-list-square-number"><sub>đ</sub>0</p>
                    </div>
                </div>
                <h1 class="sale_analysis-block2-title2">Product Ranking</h1>
                <a class="sale_analysis-block2_type_menu">
                    <p>All Type</p>
                    <img src="http://127.0.0.1:8000/icons/arrow-up.svg" alt="error" class="sale_analysis-block2-chooseType_menu">
                </a>
                <div class="sale_analysis-block3">
                    <div class="sale_analysis-block3__heading">
                        <h2 class="sale_analysis-block3__heading-title">Rank</h2>
                        <h2 class="sale_analysis-block3__heading-title">Informatin</h2>
                        <h2 class="sale_analysis-block3__heading-title">Revenue</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
