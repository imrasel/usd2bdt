<?php
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Mail;
 
class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to("ras3lahmed@gmail.com")->send(new DemoEmail($objDemo));
    }

    public function register_email($name, $receiver)
    {
        $objMail = new \stdClass();
        $objMail->demo_one = 'Demo One Value';
        $objMail->demo_two = 'Demo Two Value';
        $objMail->sender = 'admin@usd2bdt.com';
        $objMail->receiver = $receiver;
        $objMail->name = $name;
 
        Mail::to($receiver)->send(new RegisterEmail($objMail));
    }
}