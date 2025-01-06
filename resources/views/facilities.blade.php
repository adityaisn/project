@extends('layouts.web')
@section('content')
    <main>

        <!-- slider Area Start-->
        <div class="slider-area">
            <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="public/ram.jpg" >
                <div class="container">
                    <div class="row ">
                        <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                            <div class="hero-caption">
                                <span>Facilities</span>
                                <h2>Facilities</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Make customer Start-->
        <section class="make-customer-area mt-20 mb-5">
         <div class="container">
             <div class="row text-center">
                <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\parking.png')}}" width="60" height="60"></a><br>
                     <h4>Free Parking</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\hot.png')}}" width="60" height="60"></a><br>
                     <h4>Hot Water</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\cctv.png')}}" width="60" height="60"></a><br>
                     <h4>CCTV</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\luggage.png')}}" width="60" height="60"></a><br>
                     <h4>Luggage Storage</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\internet.jpg')}}" width="60" height="60"></a><br>
                     <h4>Internet Facility</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\card.svg')}}" width="60" height="60"></a><br>
                     <h4>Card Payment</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\power.png')}}" width="60" height="60"></a><br>
                     <h4>Power Backup</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\acrooms.png')}}" width="60" height="60"></a><br>
                     <h4>AC Rooms</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\safety.png')}}" width="60" height="60"></a><br>
                     <h4>Room Safety</h4>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\tv.png')}}" width="60" height="60"></a><br>
                     <h4>TV </h4>
                </div>
              </div>
              
              <div class="col-sm-3">
                <div class="card">
                    <a href="#"><img src="{{url('public\facility\12pm.webp')}}" width="60" height="60"></a><br>
                     <h4>2 Pm Checkin In <br> 12 Pm Checkout</h4>
                </div>
              </div>
            </div>
        </div>
        </section>
        <!-- Make customer End-->
    </main>
    <style type="text/css">
        .card{
            padding: 20px;
            margin-bottom: 20px;
            height: 170px;
        }
    </style>
@endsection