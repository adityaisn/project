<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testonomial;
use App\Models\Enquiry;
use App\Models\Blog;
use App\Models\Roomimage;
use App\Models\Roominfo;
use App\Models\Webenquiry;
use App\Models\Roombooking;
use App\Models\Bookingcancle;
use App\Models\Gallery;
use App\Models\Roomtype;
use App\Models\Bookroomweb;

class IndexController extends Controller
{
    public function index()
    {
        $rooms = Roomtype::get();
        $gallery = Gallery::orderBy('id','DESC')->limit(6)->get();
        $test = Testonomial::where('status','Display')->orderBy('id','DESC')->get();
        return view('welcome',compact('rooms','test','gallery'));
    }
    public function about()
    {
        $rooms = Roomtype::get();
        $gallery = Gallery::orderBy('id','DESC')->limit(6)->get();
        $test = Testonomial::where('status','Display')->orderBy('id','DESC')->get();
        return view('about',compact('rooms','test','gallery'));
    }
     public function viewrooms($id)
    {
        $room_data = Roomtype::where('id',$id)->first();
        $rooms = Roomtype::where('id','!=',$id)->get();
        $room_images = Roomimage::where('room_type_id',$id)->get();
        return view('viewrooms',compact('room_data','room_images','rooms'));
    }
     public function viewblog($id)
    {
        $blog_data = Blog::where('id',$id)->first();
        $blog = Blog::where('id','!=',$id)->orderBy('id','ASC')->limit(6)->get();
        return view('viewblog',compact('blog_data','blog'));
    }
     public function rooms()
    {
        $rooms = Roomtype::get();
        return view('rooms',compact('rooms'));
    }
    public function gallery()
    {
        $gallery = Gallery::get();
        return view('gallery',compact('gallery'));
    }
    public function canclebooking()
    {
        return view('canclebooking');
    }
    public function blog()
    {
        $blog = Blog::orderBy('id','DESC')->get();
        return view('blog',compact('blog'));
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function thankyou1()
    {
        return view('thankyou1');
    }
    public function insert_testo(Request $request)
    {
        $store = Testonomial::FirstOrCreate([
            'name' => $request->get('cust_name'),
            'designation' => $request->get('post'),
            'testonomials' => $request->get('testonomial'),
            'status' => 'Hide',
        ]);

        return redirect()->back()->with('success','Thanks for your lovely Review........');
    }
    public function checkroom(Request $request)
    {
       $guest = $request->get('guests');
       $custrooms = $request->get('rooms');
       $data = Roombooking::where('check_in_date',$request->get('checkin-date'))->orWhere('check_out_date',$request->get('checkout-date'))->get('room_id');
       $room_data =  Roominfo::where('status','Available')->distinct()->get('room_type');
       foreach ($room_data as $row) 
       {
          $rooms[] = Roomtype::where('id',$row['room_type'])->get();
       }
       $data1 = json_encode($rooms);
       return view('checkrooms',compact('rooms','guest','custrooms'));
    }
    public function bookrooms($room_id)
    {
      $data = Roomtype::where('id',$room_id)->first();
      $roofrate =  $data->adult_rate;
      if ($roofrate < 1000) {
        $gstamount =  $roofrate - ($roofrate * (100 / (100 + 18 ) ) );
      }
      else{
        $gstamount =  $roofrate - ($roofrate * (100 / (100 + 18 ) ) );
      }
      $room_rate1 = $roofrate;
      $room_rate = round($room_rate1);
      $per = explode(' ',$data->capacity);
      $person = $per[0];
      $soft_room_avail =  Roominfo::where('room_type',$room_id)->where('status','Available')->count('id');
      $soft_room_cleaning =  Roominfo::where('room_type',$room_id)->where('status','Cleaning')->count('id');
      $web_room_avail =  Bookroomweb::where('room_id',$room_id)->where('status','Paid')->sum('no_of_rooms');
      $room_available = ($soft_room_avail +  $soft_room_cleaning)  -  $web_room_avail;
       return view('bookroom',compact('data','room_rate','person','room_available'));
    }
    public function roombook(Request $request)
    {
       $checkoutdate = $request->get('checkout-date');
       $checkindate = $request->get('checkin-date');
       $adult = $request->get('adults');
       $child = $request->get('children');
       $data = Roomtype::where('id',$request->get('room_id'))->first();
       return view('roombook',compact('data','checkoutdate','checkindate','adult','child'));
    }
    public function insert_contact(Request $request)
    {   
        $to = 'blueviperstechnology@gmail.com';
        $subject = 'Enquiry From '.$request->get('name').' On Website';
        $user_email = 'crosseratechnology@gmail.com';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$user_email."\r\n".
            'Reply-To: '.$user_email."\r\n" .
            'X-Mailer: PHP/' . phpversion();
         
        $name = $request->get('name');
        $email = $request->get('email');
        $message = $request->get('message');
      
        $message = view('enquirymail',compact('name','email','message'));
        $mail_reply = mail($to, $subject, $message, $headers);

        $store = Enquiry::FirstOrCreate([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ]);

        return redirect()->back()->with('success','Your Enquiry  Successfully Submitted');
    }

    public function insert_room(Request $request)
    {
        if ($request->get('taxabletotal') < 199 || $request->get('total_amount') > 50000) 
        {
           return redirect()->route('rooms')->with('alert','Please check Checkout Date and Checkin Date is in Correct Format');
        }
        else
        {
         $store =  Bookroomweb::firstOrCreate([
                'name' => $request->get('name'),
                'mobile' => $request->get('mobile'),
                'email' => $request->get('email'),
                'address' => $request->get('whatsapp_no'),
                'state' => $request->get('state'),
                'pincode' => $request->get('pincode'),
                'room_id' => $request->get('room_id'),
                'room_rate' => $request->get('room_rate'),
                'no_of_persons' => $request->get('adult'),
                'no_of_rooms' => $request->get('no_rooms'),
                'extra_person' => $request->get('extra_bed'),
                'person_qty' => $request->get('extrapqty'),
                'person_rate' => $request->get('extrapersonrate'),
                'checkindate' => $request->get('checkin'),
                'checkoutdate' => $request->get('checkout'),
                'no_of_day' => $request->get('noofday'),
                'totalamount' => $request->get('total_amount'),
                'discount' => $request->get('discount'),
                'discountamount' => $request->get('discountamount'),
                'gst' => $request->get('gst'),
                'gstamount' => $request->get('gst_amount'),
                'taxable' => $request->get('taxabletotal'),
                'status' => "Paid",

        ]);

        // $to = $request->get('email');
        // $subject = 'Dear '.$request->get('name').', Welcome To Ramleela Lodge Tuljapur';
        // $user_email = 'crosseratechnology@gmail.com';
        // $headers  = 'MIME-Version: 1.0' . "\r\n";
        // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= 'From: '.$user_email."\r\n".
        //     'Reply-To: '.$user_email."\r\n" .
        //     'X-Mailer: PHP/' . phpversion();
         
        // $fullname = $request->get('name');
       
        // $message = view('welcomemail',compact('fullname'));
        // $mail_reply = mail($to, $subject, $message, $headers);
        // if ($mail_reply=='1') 
        // {
        //     $r = 'Mail Sent';
        // }
        // else
        // {
        //     $r = 'Mail Waiting';
        // }

        
        $room_data = Roomtype::where('id',$request->get('room_id'))->first();

        // $api = new \Instamojo\Instamojo(
        //         config('services.instamojo.api_key'),
        //         config('services.instamojo.auth_token'),
        //         config('services.instamojo.url')
        //     );
     
        // try {
        //    $response = $api->paymentRequestCreate(array(
        //         "purpose" => $room_data->room_types.' Booking Room',
        //         "amount" => $request->get('taxabletotal'),
        //         "buyer_name" => $request->get('name'),
        //         "send_email" => true,
        //         "email" => $request->get('email'),
        //         "phone" => $request->get('mobile'),
        //         "redirect_url" => "http://localhost/Ramleela%20logde/pay-success_".$store->id.""
        //         ));
                 
        //         header('Location: ' . $response['longurl']);
        //         exit();
        // }catch (Exception $e) {
        //     print('Error: ' . $e->getMessage());
        // }

         return redirect()->route('rooms')->with('success','Thank Your For Booking.');
        }
     
    }
         
    public function success(Request $request,$id)
    {
       $data = Bookroomweb::where('id',$id)->first();
     try {
        $api = new \Instamojo\Instamojo(
            config('services.instamojo.api_key'),
            config('services.instamojo.auth_token'),
            config('services.instamojo.url')
        );
        $response = $api->paymentRequestStatus(request('payment_request_id'));
        if( !isset($response['payments'][0]['status']) ) {

            // $mobileNumber = '8308388181';
            // $rohan = '';
            // $message = urlencode("Customer Payment Pending by Instamojo Customer Name: ".$data->name.", Mobile: ".$data->mobile.",Amount: ".$data->taxable." ");
           
            // $api_url = "http://kutility.org/app/smsapi/index.php?key=560B3298D08A5D&campaign=11640&routeid=7&type=text&contacts=".$mobileNumber."&senderid=TULJAM&msg=".$message."&template_id=1207162176162784504";
            // $ch = curl_init($api_url);
            // curl_setopt($ch, CURLOPT_POST,1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS,$api_url);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            // curl_setopt($ch, CURLOPT_HEADER,0);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // $return_val = curl_exec($ch);

            return $myerror = 'We are Very Sorry About Any Error Regarding Payment Plz Contact for Booking Room 9921615111 <a target="_blank" href="http://ramleelalodge.com/">Click Here to Visit Website</a>';

        } else if($response['payments'][0]['status'] != 'Credit') {

            // $mobileNumber = '8308388181';
            // $rohan = '';
            // $message = urlencode("Customer Payment Pending by Instamojo Customer Name: ".$data->name.", Mobile: ".$data->mobile.",Amount: ".$data->taxable." ");
           
            // $api_url = "http://kutility.org/app/smsapi/index.php?key=560B3298D08A5D&campaign=11640&routeid=7&type=text&contacts=".$mobileNumber."&senderid=TULJAM&msg=".$message."&template_id=1207162176162784504";
            // $ch = curl_init($api_url);
            // curl_setopt($ch, CURLOPT_POST,1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS,$api_url);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            // curl_setopt($ch, CURLOPT_HEADER,0);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // $return_val = curl_exec($ch);

            return $myerror = 'We are Very Sorry About Any Error Regarding Payment Plz Contact for Booking Room 9921615111 <a target="_blank" href="http://ramleelalodge.com/">Click Here to Visit Website</a>';
        }
        else
        {
            $update =  Bookroomweb::where('id',$id)->update(['status' => 'Paid',]);  

            // $api_key = '5622BF02A1CA20';
            // $contacts = '9130244551';
            // $from = 'DEMO';
            // $message = urlencode("Congrats, New Customer Booking From Website. Customer Name :  ".$data->name.", Customer Mobile : ".$data->mobile.", Check In Date : ".$data->checkindate.". Thank You, Team Hotel Siddhi.");

            // $api_url = "http://jskbulksms.in/app/smsapi/index.php?key=".$api_key."&campaign=9498&routeid=46&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$message;

            // $response = file_get_contents( $api_url);

            // $ch = curl_init($api_url);
            // curl_setopt($ch, CURLOPT_POST,1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS,$api_url);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            // curl_setopt($ch, CURLOPT_HEADER,0);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            // $return_val = curl_exec($ch);

            return redirect()->route('index');
        } 
          }catch (\Exception $e) {
              return redirect()->route('index');

         }
        dd($response);
    }



    public function insert_booking_enquiry(Request $request)
    {
       
         $store =  Webenquiry::firstOrCreate([
            'custname' => $request->get('cust_name'),
            'custmobile' => $request->get('cust_mobile'),
            'address' => $request->get('cust_address'),
            'pincode' => $request->get('pin_code'),
            'checkindate' => $request->get('checkin_date'),
            'checkoutdate' => $request->get('checkout_date'),
            'no_of_persons' => $request->get('no_of_persons'),
            'no_of_room' => $request->get('no_of_rooms'),
            'note' => $request->get('note'),
            'status' => 'Online Booking',
            'other1' => $request->get('reference'),
            'other2' =>'',
        ]);

        return redirect()->back()->with('success','Your Booking Information is Successfully Submitted');

     }

    public function insert_canclebooking(Request $request)
    {
        $store =  Bookingcancle::firstOrCreate([
            'custname' => $request->get('cust_name'),
            'custmobile' => $request->get('cust_mobile'),
            'email' => $request->get('emailid'),
            'reason' => $request->get('reason'),
            'checkindate' => $request->get('checkin_date'),
            'checkoutdate' => $request->get('checkout_date'),
            'other1' =>'',
            'other2' =>'',
        ]);
        return redirect()->back()->with('success','Cancle Booking Request Successfully Sent');
     }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function refund()
    {
        return view('refund');
    }
}
