<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function form(Request $request)
    {
        $to_email = \DB::table('settings')->first()->contact_email;
        $this->validate($request, [
            'phone' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            //'captcha' => 'required|captcha',
        ]);

        $subject  = 'إرسال استفسار ';
        $message  = request('message');
        $name  = request('name');
        $email  = request('email');


        $message_body = "<html><body><table border='0' dir='rtl' width='100%' cellpadding='5' cellspacing='0'><tr><td align='right'>
					<h2> اتصال عن طريق  الموقع  ".$_SERVER['HTTP_HOST']." - بتاريخ : ".date('d-m-Y')." </h2><br /><br /> 
					<h2>وفيما يلي تفاصيل الاتصال : <br /><br />
					الاسم : ".$name."<br />
					البريد الإلكتروني: ".$email."<br />
					الموضوع : ".$subject."<br /><br /><br /></h2>
					<h2>	الرسالة : </h2><h2>".$message."</h2>
					</td></tr></table></body></html>";

        //Set up the email headers
        $headers  = "From: $name <$email>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        //$headers   .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n";
        $headers .= "Message-ID: <$to_email/>". "\r\n";

        if (@mail($to_email, $subject, $message_body, $headers)) {
            return response()->json(
                [
                    'status' => 'success',
                    'message' =>  'تم الارسال بنجاح',
                ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'خطأ في الارسال']);
        }


    }
}
