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
                                <span>Rooms</span>
                                <h2>Available Rooms</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Room Start -->
        <section class="room-area r-padding1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <!--font-back-tittle  -->
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front">
                                <h3>Our Rooms</h3>
                            </div>
                            <h3 class="archivment-back">Our Rooms</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                 @foreach($rooms as $row)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <!-- Single Room -->
                        <div class="single-room mb-50">
                            <div class="room-img">
                               <a href="view-room-{{$row[0]['id']}}"><img src="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row[0]['headimg']}}" alt="" width="100%" height="300"></a>
                            </div>
                            <div class="room-caption">
                                <h3 style="color:#fc910e"><a href="view-room-{{$row[0]['id']}}">{{$row[0]['room_types']}}</a></h3>
                                <div class="per-night">
                                    <span>Rs. {{$row[0]['adult_rate']}} <span>/ par day</span></span>
                                </div>
                                <div class="mt-4">
                                    <a href="view-room-{{$row[0]['id']}}" class="view-btn">View Details</a>
                                    <a href="book-room-{{$row[0]['id']}}" class="book-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
                </div>
            </div>

        </section>
        <!-- Room End -->

      
    </main>
@endsection