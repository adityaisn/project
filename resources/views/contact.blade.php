@extends('layouts.web')
@section('content')
<!-- slider Area Start-->
    <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="public/ram.jpg" >
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                             @if(\Session::has('success'))
                                <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p>{{\Session::get('success')}}</p>
                                </div>
                                @endif
                            <span>Contact</span>
                            <h2>Contact</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3794.342863236673!2d76.06527527429087!3d18.00928498459394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5bf830a9d5439%3A0xe2f63e1d1010df7f!2sHotel%20Ram%20Leela%20Lodge!5e0!3m2!1sen!2sin!4v1682779715662!5m2!1sen!2sin" width="630" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="insert_contact" method="post" >
                         {{@csrf_field()}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="20" rows="5" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Deepak Chowk, Ghatshil Road, Tuljapur, Dist. Osmanabad,</h3>
                                <p>Dist. Osmanabad, MH -  413501.</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3><a href="tel:+91 8459432930"> +91 8459432930</a></h3><br>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a  href="mailto:ramleelalodge@gmail.com">ramleelalodge@gmail.com</a></h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    
@endsection