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
                                <span>Gallery</span>
                                <h2>Gallery</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Make customer Start-->
        <section class="make-customer-area mt-20">
         <div class="container">
             <div class="row">
              @foreach($gallery as $row)
              <div class="col-sm-3">
                  <div class="rnc">
                    <a href="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row['photo']}}"><img src="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row['photo']}}" width="100%" height="250"></a>
                  </div>
              </div>
              @endforeach
            </div>
        </div>
        </section>
        <!-- Make customer End-->
    </main>

    <style type="text/css">
        .rnc{
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 black;
            border-radius: 5px; 
        }
    </style>
@endsection