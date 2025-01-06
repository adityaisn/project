@extends('layouts.web')
@section('content')
 <main>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active dot-style">
                <div class="hero-overly slider-height d-flex align-items-center" data-background="public/main.jpg" >
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9">
                                <div class="h1-slider-caption">
                                    @if(\Session::has('success'))
                                    <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p>{{\Session::get('success')}}</p>
                                    </div>
                                    @endif
                                    <!-- <h1 data-animation="fadeInUp" class="txt-shadow" data-delay=".4s"><span style="color:orangered;text-shadow: 1px 1px  1px white;font-size: 50px;">RAMLEELA</span><br> <span ><b style="color:orangered;text-shadow: 1px 2px  2px white;">LODGE TULJAPUR</b></h1> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <!-- Booking Room Start-->
       
        <!-- Room Start -->
        <section class="room-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front"><br><br>
                                <h3>Our Rooms</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                 @foreach($rooms as $row)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                       <div class="single-room mb-50">
                           <!--  <div class="room-img">
                               <a href="view-room-{{$row['id']}}"><img src="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row['headimg']}}" alt="" width="100%" height="300"></a>
                            </div> -->
                            <div class="room-caption">
                                <h3 style="color:#fc910e"><a href="view-room-{{$row['id']}}">{{$row['room_types']}}</a></h3>
                                <div class="per-night">
                                    <span>Rs. {{$row['adult_rate']}} <span>/ per day</span></span>
                                </div>
                                <div class="mt-4">
                                    <a href="view-room-{{$row['id']}}" class="view-btn">View Details</a>
                                    <a href="book-room-{{$row['id']}}" class="book-btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
                </div>
            </div>
        </section>
        <!-- Room End -->
        <!-- Dining Start -->
        <div class="dining-area dining-padding-top">
            <div class="single-dining-area left-img">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-8 col-md-8">
                            <div class="dining-caption  bd-img">
                                <span>About</span>
                                <h3>Ramleela Lodge Tuljapur </h3>
                                <p>Located in the Tuljapur, Maharashtra, India area of Tuljapur, Hotel Ram Leela Lodge is an ideal choice for both business and leisure travellers. Hotel Ram Leela Lodge has been proving its excellent hospitality services to its guests by providing them with a pleasant stay experience.<br><br> The friendly staff and quick service ensure catering to the personalized needs and requirements of the guests. As per the hotel policies, Hotel Ram Leela Lodge allows check-in at 12:00 and the standard check-out time is 12:00.<br><br>The early check-in and late check-out policies are solely managed by the hotel management. To facilitate a smooth check-in process, the guests are required to carry a valid photo ID proof.</p>
                                <a href="about" class="btn border-btn">Read More <i class="ti-angle-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Dining End -->

        <!-- Testimonial Start -->
        <div class="testimonial-area testimonial-padding">
            <div class="container">
                 <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="font-back-tittle mb-45">
                            <div class="archivment-front"><br><br>
                                <h3>Testimony</h3>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="h1-testimonial-active">
                            @foreach($test as $row)
                            <div class="single-testimonial  pt-65">
                               <!-- Testimonial Content  -->
                                <div class="testimonial-caption text-center">
                                    <p>{{$row['testonomials']}}</p>
                                    <div class="rattiong-caption">
                                        <span>{{$row['name']}}, <span>{{$row['designation']}}</span> </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                     <div class="col-xl-1"></div>
                     <div class="col-xl-4">
                        <div class="comment-form">
                          <form class="form-contact comment_form" action="insert_testo" method="post"  id="commentForm">
                            {{@csrf_field()}}
                             <div class="row">
                                <div class="col-12">
                                   <div class="form-group">
                                      <textarea class="form-control"  name="testonomial" id="comment" placeholder="Write Comment"></textarea>
                                   </div>
                                </div>
                                <div class="col-sm-12">
                                   <div class="form-group">
                                      <input class="form-control" name="cust_name" id="name" type="text" placeholder="Name">
                                   </div>
                                </div>
                                <div class="col-12">
                                   <div class="form-group">
                                      <input class="form-control" name="post" id="website" type="text" placeholder="Address">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- Testimonial End -->
        <!-- Gallery img Start-->
        <div class="gallery-area fix">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="gallery-active owl-carousel">
                            @foreach($gallery as $row)
                                <div class="gallery-img">
                                    <a href="#"><img src="http://localhost/Hotel%20Booking%20Sakshi/public/{{$row['photo']}}" height="250" alt="galley-img" class="galimg" style="border:1px solid #4545"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gallery img End-->
    </main>

<script type="text/javascript">
      $(function(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;
        $('#textDate1').attr('min', maxDate);
        $('#textDate2').attr('min', maxDate);
    });
    </script>
@endsection