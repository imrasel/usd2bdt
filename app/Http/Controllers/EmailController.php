<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Notifications\SendEmail;

class EmailController extends Controller
{
    public function index()
    {
    	$users = User::all();
        return view('test', compact('users'));
    }

    public function send_email(Request $request)
    {
    	$user = User::find($request->id);
        //send an Email to user
        $user->notify(new SendEmail($user));
    }
}
