@extends('layouts.web')
@section('content')
  <!-- slider Area Start-->
    <div class="slider-area">
      <div class="single-slider hero-overly slider-height2 d-flex align-items-center"  style="background:url(http://booking.ramleelalodge.com/public/{{$data->headimg}});background-size: cover;background-repeat: no-repeat;width: 100%;"  >
          <div class="container">
              <div class="row ">
                  <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p>{{\Session::get('success')}}</p>
                        </div>
                        @endif
                      <div class="hero-caption">
                          <span>Book A </span>
                          <h2>{{$data->room_types}} </h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 <!-- slider Area End-->


   <!--================Blog Area =================-->
   <section class="blog_area single-post-area " style="padding:20px">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8 posts-list">
              <div class="google-maps-contact-content">
                     <div class="roberto-contact-form">
                        <form action="insert_room" method="post" onsubmit="reloadpage()">
                            {{@csrf_field()}}
                            <div class="row">
                                 <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> No of Rooms</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <span style="color:red;font-size: 14px;padding-bottom: 5px;" id="room_msg"></span>
                                    <input  autofocus type="number" name="no_rooms" id="no_rooms" class="form-control mb-30" onkeyup="checkRoom()"  placeholder="Number of  Booking Rooms" required>
                                    <input type="hidden" name="available_rooms" id="available_rooms" value="{{$room_available}}">
                                </div>
                                 <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> Total Person</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <span style="color:red;font-size: 14px;padding-bottom: 5px;" id="person_msg"></span>
                                    <input  type="number" name="adult" id="adult" class="form-control mb-30" onkeyup="getDay()" value="1" required placeholder="Number of person stay">
                                    <input type="hidden" name="experson1" id="experson1" value="{{$person}}">
                                    <input type="hidden" name="experson" id="experson" value="{{$person}}">
                                </div>
                                
                                 <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> Check IN </label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="date" onchange="getDay(),checkDate(this.id)" value="<?php echo date('Y-m-d')?>" name="checkin" id="checkin" class="form-control mb-30" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> Check Out</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="date" onchange="getDay(),checkDate(this.id)" name="checkout" id="checkout" class="form-control mb-30" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));?>"  required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> Room Rate</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input readonly type="number" name="room_rate" value="{{$room_rate}}" id="room_rate" class="form-control mb-30" readonly style="color:black" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label>Extra Person </label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                   <select class="select-my" name="extra_bed" id="extra_bed" onchange="extraRate()" required>
                                       <option value="None">None</option>
                                       <option value="With Bed">With Bed</option>
                                       <!-- <option value="Without Bed">Without Bed</option> -->
                                   </select>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label>Extra Person Quantity</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <span style="color:red;font-size: 14px;padding-bottom: 5px;" id="per_qty"></span>
                                      <input  type="text" name="extrapqty" id="extrapqty" onkeyup="extraRate()" class="form-control mb-30" value="0" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label>Extra Person Rate</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                      <input readonly type="text" name="extrapersonrate" id="extrapersonrate" class="form-control mb-30" value="0" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label>Your  Name</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="text" name="name" id="name" class="form-control mb-30" placeholder="Name" required>
                                    <input type="hidden" name="room_id" value="{{$data->id}}" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label>Your  Mobile</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="text" name="mobile" id="mobile" class="form-control mb-30"  placeholder="Mobile"  minlength="10" maxlength="10" autocomplete="off" oninput="return onlynum()" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label>Your  Email</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="email" name="email" id="email" class="form-control mb-30" placeholder="Email" required>
                                </div>
                                <!-- <div class="col-lg-3 fadeInUp" data-wow-delay="100ms">
                                    <label>Customer Address</label>
                                </div>
                                 <div class="col-lg-8 fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="address" class="form-control mb-30" placeholder="Address" required>
                                </div>
                                <div class="col-lg-3 fadeInUp" data-wow-delay="100ms">
                                    <label> State</label>
                                </div>
                                 <div class="col-lg-8 fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="state" class="form-control mb-30" placeholder="State" required>
                                </div> -->
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> Pin Code</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="text" minlength="6" maxlength="6" autocomplete="off" oninput="return onlynum()" name="pincode" id="pincode" class="form-control mb-30" placeholder="Pincode" required>
                                </div>
                                <div class="col-lg-2 fadeInUp" data-wow-delay="100ms">
                                    <label> Whatsapp No</label>
                                </div>
                                 <div class="col-lg-4 fadeInUp" data-wow-delay="100ms">
                                    <input  type="text" name="whatsapp_no" id="whatsapp_no" class="form-control mb-30" placeholder="Whatsapp No"  minlength="10" maxlength="10" autocomplete="off" oninput="return onlynum()" required>
                                </div>
                                <input type="hidden" readonly  style="color:black" value="0" name="noofday" id="noofday" class="form-control mb-30" required>
                                <input type="hidden"   name="total_amount" id="total_amount" class="form-control mb-30" readonly  style="color:black" required>
                                <input type="hidden"   name="discount" id="discount" class="form-control mb-30" readonly  style="color:black" required value="{{$data->child_rate}}">
                                <input type="hidden"   name="discountamount" id="discountamount" class="form-control mb-30" readonly  style="color:black" required>
                                <input type="hidden"   name="distotal" id="distotal" class="form-control mb-30" readonly  style="color:black" required>
                                <input type="hidden" readonly  style="color:black" value="" name="gst" id="gst" class="form-control mb-30" required>
                                <input type="hidden" readonly  style="color:black" value="0" name="gst_amount" id="gst_amount" class="form-control mb-30" required>
                                <input type="hidden"   name="taxabletotal" id="taxabletotal" class="form-control mb-30" readonly  style="color:black" required>
                            </div>
                     </div>
                    </div> 
            </div>
            <div class="col-lg-4">
                      <div class="google-maps-contact-content">
                        <p>No of Persons <span id="radults" class="fright">-</span></p>
                        <p>Check In <span id="rcheckin" class="fright">-</span></p>
                        <p>Check Out <span id="rcheckout" class="fright">-</span></p>
                        <h5><b>Total No of Day</b> <span id="rnoofstay" class="fright"> -</span></h5>
                        <hr class="amnhr">
                        <p>Total Cost of Room <span id="rcost" class="fright">-</span></p>
                        <p>No of Rooms <span id="rnorooms" class="fright">-</span></p>
                        <p>Taxes <span id="rtaxes" class="fright">-</span></p>
                        <p>Taxable <span id="taxab" class="fright">-</span></p>
                        <p>Discount (Rs. {{$data->child_rate}})<span id="rdiscount" class="fright">-</span></p>
                        <hr class="amnhr">
                        <h5>Total Payble Amount<span id="ramount" class="fright">-</span></h5><hr class="amnhr">
                       <div class="text-center fadeInUp" data-wow-delay="100ms">
                            <button style="cursor:pointer;border:1px solid #FF503C" type="submit" class="view-btn" >Book Room</button>
                        </div>
                    </form>
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
     <script type="text/javascript">
         function getDay() {
        var no_rooms = document.getElementById('no_rooms').value;
        document.getElementById('rnorooms').innerHTML = no_rooms + ' Rooms';
        if (no_rooms=='') {
            document.getElementById('no_rooms').focus();
        }
        var adult = document.getElementById('adult').value;
        var experson = document.getElementById('experson').value;
        var experson1 = document.getElementById('experson1').value;
        var extrapersonrate = document.getElementById('extrapersonrate').value;
        if (adult < 1 || adult > parseInt(experson1)) 
        {
            document.getElementById('person_msg').innerHTML = 'No of Person must be Between 0 or '+experson1;
            document.getElementById('adult').value = '';
        }
        else
        {
            document.getElementById('person_msg').innerHTML = '';
            document.getElementById('radults').innerHTML =  adult;
            var checkindate = document.getElementById('checkin').value;
            var checkoutdate = document.getElementById('checkout').value;
            const diffInMs   = new Date(checkoutdate) - new Date(checkindate);
            const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
            if (diffInDays==0){
                document.getElementById('noofday').value = 1;
                var tamount = document.getElementById('room_rate').value * 1;
                document.getElementById('total_amount').value = Math.round(tamount) * parseInt(no_rooms);
            }
            else {
                document.getElementById('noofday').value = Math.round(diffInDays);
                var tamount = document.getElementById('room_rate').value * diffInDays;
                document.getElementById('total_amount').value =  Math.round(tamount)* parseInt(no_rooms);;
            }
            var discount = document.getElementById('discount').value;
            var discounted_price =  discount * parseInt(no_rooms) * diffInDays;
            document.getElementById('discountamount').value = Math.round(discounted_price)  ;

            var distotal = parseFloat(tamount) * parseInt(no_rooms) + parseInt(extrapersonrate);
            document.getElementById('distotal').value = Math.round(distotal) ;
            var gstamount = distotal * (12 / 100);
            document.getElementById('gst').value = 12;
            var randgst = 12;
            document.getElementById('gst_amount').value = gstamount;
            var finaltotal = parseFloat(gstamount)+ parseFloat(distotal) + parseInt(extrapersonrate) - parseInt(gstamount);
            document.getElementById('taxabletotal').value = Math.round(distotal) ;
                document.getElementById('total_amount').value =  Math.round(tamount)* parseInt(no_rooms) -  parseInt(gstamount) ;;

            document.getElementById('rcheckin').innerHTML = checkindate;
            document.getElementById('rcheckout').innerHTML = checkoutdate;
            if (diffInDays==0){
             document.getElementById('rnoofstay').innerHTML = '1 Days';
            }
            else {
                   document.getElementById('rnoofstay').innerHTML = ' '+Math.round(diffInDays)+' Days';
            }
            document.getElementById('rcost').innerHTML =  ' &#x20B9; '+Math.round(tamount - gstamount)+'';
            document.getElementById('rtaxes').innerHTML =  ' &#x20B9; '+Math.round(gstamount)+' ('+ randgst +' %)';
            document.getElementById('taxab').innerHTML =  ' &#x20B9; '+Math.round(distotal)+' ';
            document.getElementById('rdiscount').innerHTML =  ' &#x20B9; '+Math.round(discounted_price)+'';
            document.getElementById('ramount').innerHTML =  ' &#x20B9; '+Math.round(distotal)+'';

            }
        }
        
        function checkRoom() 
        {
            var no_rooms = document.getElementById('no_rooms').value;
            var experson = document.getElementById('experson').value;
            var available_rooms = document.getElementById('available_rooms').value;
            if (parseInt(no_rooms) > parseInt(available_rooms)) 
            {
                document.getElementById('room_msg').innerHTML = 'Only ' +available_rooms+'  rooms are available';
                document.getElementById('no_rooms').value = '';
            }
            else if(parseInt(no_rooms) <= 0)
            {
                document.getElementById('room_msg').innerHTML = 'Please enter correct no of room';
                document.getElementById('no_rooms').value = '';
            }
            else{
                document.getElementById('room_msg').innerHTML = '';
                 document.getElementById('experson1').value = experson * parseInt(no_rooms);
            }
            getDay();
        }

        function extraRate(argument) {
           var no_rooms = document.getElementById('no_rooms').value;
           var extra_bed = document.getElementById('extra_bed').value;
           var extrapqty = document.getElementById('extrapqty').value;
           var extrapersonrate = document.getElementById('extrapersonrate').value;
           if (parseFloat(no_rooms) < parseInt(extrapqty)) 
           {
                document.getElementById('per_qty').innerHTML = 'Extra Person Must be '+no_rooms ;
                 document.getElementById('extrapqty').value = '';
           }
           else
           {
            if (extrapqty <= 0) 
            {
                document.getElementById('extrapersonrate').value = 0;
            }
            else
            {
                 document.getElementById('per_qty').innerHTML = '' ;
                   if (extra_bed=='None') {
                     document.getElementById('extrapqty').value = 0;
                     document.getElementById('extrapersonrate').value = 0;
                   }else if (extra_bed=='With Bed') {
                     document.getElementById('extrapersonrate').value = parseInt(extrapqty) * 895;
                   }else {
                        document.getElementById('extrapersonrate').value = parseInt(extrapqty) * 895;
                   } 
            }
           }
            getDay();
            
        }
        // ====================== Date Function ============================
        function prevDate(argument) {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            var minDate = year + '-' + month + '-' + day;
            var maxDate = year + '-' + month + '-' + day;
            $('#checkin').attr('min', minDate);
            $('#checkout').attr('min', minDate);
        };

       function onlynum() {
        var ip = document.getElementById("mobile");
        var res = ip.value;
            if (res != '') {
                if (isNaN(res)) {
                    ip.value = "";
                    fm.reset();
                    return false;
                } else {
                    return true
                }
            }
        }
     $(document).ready(function() {
            alert();
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
    });

    function reloadpage(argument) {
    }

    // function checkDate(id) {
    //     var date1 = document.getElementById(id).value;
    //     const date = new Date(date1);
    //     const currentdate = new Date();
    //     var Date_1 = "25/09/2022";
    //     var Date_2 = "10/10/2022";

    //     D_1 = Date_1.split("/");
    //     D_2 = Date_2.split("/");
         
    //     var d1 = new Date(D_1[2], parseInt(D_1[1]) - 1, D_1[0]);
    //     var d2 = new Date(D_2[2], parseInt(D_2[1]) - 1, D_2[0]);
    //     var d3 = date;

    //     if (d3 > d1 && d3 < d2) {
    //         document.getElementById(id).value = '';
    //         alert('Rooms are not available between 25/09/2022 and 10/10/2022');
    //     }
    // }
    </script>

    <style type="text/css">
    .fright{
        float: right;
    }
    .google-maps-contact-content p{
        margin-top: -10px;
    }
    .book-d{
    background: url('public/roomback.jpg');
    padding: 20px 40px;
    text-align: center;
    box-shadow: 0 4px 8px 0 rgba(45, 0, 12, 0.2);
    }
    .google-maps-contact-content{
    padding: 20px 40px;
    box-shadow: 0 4px 8px 0 rgba(45, 0, 12, 0.2);
    background-color: white;
    }
    .effect-shine{
    font-size: 60px;
    color: #ffffff;
    margin-bottom: 50px;
    text-align: center;
    -webkit-animation: glow 1s ease-in-out infinite alternate;
    -moz-animation: glow 1s ease-in-out infinite alternate;
    animation: glow 1s ease-in-out infinite alternate;
    }

    @keyframes glow {
    from {
    text-shadow: 0 0 10px #eeeeee, 0 0 20px #000000, 0 0 30px #000000, 0 0 40px #000000, 
    0 0 50px #fff, 0 0 60px #fff, 0 0 70px #fff;
    }
    to {
    text-shadow: 0 0 20px #eeeeee, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6,
    0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
    }
    }
    .amnhr
    {
        margin-top: 5px;
    }
    .select-my
    {
        display: block;
        width: 100% !important;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 2.0;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da !important;
        border-radius: 0.25rem;
    }
    .myoption
    {
    }
    </style>
@endsection