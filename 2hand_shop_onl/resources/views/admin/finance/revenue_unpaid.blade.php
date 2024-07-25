@extends('layouts.app-admin')

@section('content')
 <section class="revenue_unpaid-section">
    <div class="container">
        <div class="revenue_unpaid-block1"> 
            <h1>Overview</h1>
            <div class="revenue_unpaid-block1__status">
                <h2 class="revenue_unpaid-block1__status revenue_unpaid-block1__status_Separate ">Unpaid</h2>
                <h2 class="revenue_unpaid-block1__status">Paid</h2>
            </div>
            <div class="revenue_unpaid-block1__title-static">
                <p>Total</p>
                <div class="revenue_unpaid-block1__static-per-time">
                    <p>This week</p>
                    <p>This month</p>
                    <p>This year</p>
                </div>
            </div>
            <div class="revenue_unpaid-block1__static">
                <p><sub style="font-size: 16px">đ</sub>0</p>
                <div class="revenue_unpaid-block1__cal-static">
                    <p><sub style="font-size: 16px">đ</sub>0</p> 
                    <p style="font-size: 16px"><sub style="font-size: 13px">đ</sub>0</p>
                    <p style="font-size: 16px"><sub style="font-size: 13px">đ</sub>116000</p>
                </div> 
            </div>  
        </div>   
        <div class="revenue_unpaid-block2">
            <div class="revenue_unpaid-block2_Info">
                <h1 class="revenue_unpaid-block2_Info-Detail">Detail</h1>
                <div class="revenue_unpaid-block2_Info-Research">
                    <input class="revenue_unpaid-block2_Info-Research__input" type="text" placeholder="Find order">
                    <img src="http://localhost:8000/icons/loupe_1.svg" alt="error">
                </div>
            </div>
            <div class="revenue_unpaid-block2__status">
                <span class="revenue_unpaid-block2__status-line">
                    <h2 class="revenue_unpaid-block2__status-child1">Unpaid</h2>
                    <div class="revenue_unpaid-block2__status-line1"></div>
                </span> 
                <h2 class="revenue_unpaid-block2__status-child2">Paid</h2>
            </div>
            <a class="revenue_unpaid-block2__Datetime">
                    <img src="http://localhost:8000/icons/calendar1.svg" alt="error" class="revenue_unpaid-block2__Datetime-calendar-icon">
                    <h2 class="revenue_unpaid-block2__Datetime-calendar">This week: </h2>
                    <h2 class="revenue_unpaid-block2__Datetime-chooseDate">13/11/2023 - 18/11/2023</h2>
                    <img src="http://127.0.0.1:8000/icons/arrow-up.svg" alt="error" class="revenue_unpaid-block2__Datetime-chooseDate_menu">
            </a>
            <div class="revenue_unpaid-block3">
                <div class="revenue_unpaid-block3__heading">
                    <h2 class="revenue_unpaid-block3__heading-title">Order</h2>
                    <h2 class="revenue_unpaid-block3__heading-title">Expected payment date</h2>
                    <h2 class="revenue_unpaid-block3__heading-title">Status</h2>
                    <h2 class="revenue_unpaid-block3__heading-title">Payment method</h2>
                    <h2 class="revenue_unpaid-block3__heading-title">Unpaid amount</h2>
                </div>
            </div>
        </div>
        
    </div>
 </section>
@endsection