@extends('layouts.web')
@section('content')
  <!-- slider Area Start-->
    <div class="slider-area">
      <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="public/ram.jpg" >
          <div class="container">
              <div class="row ">
                  <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                      <div class="hero-caption">
                          <span>Rooms</span>
                          <h2>{{$room_data->room_types}}</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 <!-- slider Area End-->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                   <div class="slider-area ">
                    <div class="slider-active dot-style">
                         @foreach($room_images as $row)
                            <div class="slider-height1" data-background="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row['room_image']}}"></div>
                         @endforeach
                    </div>
                </div>
              <div class="blog_details">
                 <ul class="blog-info-link  mb-2">
                    <li style="font-size: 20px;"><b style="color: #FF5E4C;">Bed Size :</b> {{$room_data->room_size}} Bed.</li>
                    <li style="font-size: 20px;"><b style="color: #FF5E4C;">Capacity :</b> {{$room_data->capacity}} Persons.</li>
                 </ul>
                 <!-- <ul class="blog-info-link  mb-2">
                    <li><b style="color: #DCA73A;">Bathroom :</b> Atach</li>
                    <li><b style="color: #DCA73A;">Services :</b> {{$room_data->services}}</li>
                 </ul> -->
                 <p class="excert">{{$room_data->shortdesc1}}</p>
                 <p class="excert">{{$room_data->shortdesc2}}</p>
              </div>
              <div class="blog_right_sidebar">
                 <aside class="single_sidebar_widget popular_post_widget" style="background-color: white;">
                    <h3 class="widget_title">Free Items</h3>
                    <div class="row">
                        <div class="col-sm-4">
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Shower</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Gel</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Conditionor</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Moisturizer</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Shampoo</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Gillete</h5>
                           
                        </div>
                        <div class="col-sm-4">
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Comb</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Hair Oil</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Colgate</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Brush</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;Soap</h5>
                           <h5><i class="fa fa-asterisk"></i> &nbsp;&nbsp;2 Water Bottle Free</h5>
                        </div>
                    </div>
                 </aside>
                </div>  
                 <br><center><a href="book-room-{{$room_data->id}}" class="view-btn1" style="color:white !important;font-size: 20px">Book Room Now</a></center>
               </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                 <aside class="single_sidebar_widget popular_post_widget" style="background-color: white;">
                    <h3 class="widget_title">More Rooms</h3>
                        @foreach($rooms as $row)
                         <div class="media post_item">
                            <img src="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row['headimg']}}" alt="post" height="100" width="100">
                            <div class="media-body">
                               <a href="view-room-{{$row['id']}}">
                                  <h3>{{$row['room_types']}}</h3>
                               </a>
                               <p>Rs. {{$row['adult_rate']}} <span>/ par day</span></p>
                               <p style="margin-top: 10px;"><a href="view-room-{{$row['id']}}" style="color:white !important;" class="view-btn1">View Details</a></p>
                            </div>
                         </div><hr>
                        @endforeach
                 </aside>
                </div>
            </div>
            
         </div>
      </div>
   </section>

   <style type="text/css">
       .slider-height
       {
        height: 100px !important;
       }
   </style>
   <!--================ Blog Area end =================-->
@endsection