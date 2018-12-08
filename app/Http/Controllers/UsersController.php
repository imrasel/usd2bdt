<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Transaction;
use Session;
use Hash;
use Auth;
use App\Category;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('admin', '=', 0)->paginate(10);
        return view('admin.users.index')->with('users',$users)
                                        ->with('scroll',Category::find(1));
    }

    public function admin()
    {
        $users = User::where('admin', '=', 1)->get();
        return view('admin.users.admin')->with('users',$users)
                                        ->with('scroll',Category::find(1));
    }

    public function showChangePasswordForm(){


        return view('auth.changepassword');
    }
    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.png'
        ]);

        Session::flash('success', 'User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function user_index($id)
    {
        $user = User::find($id);
        $transations = Transaction::where('user_id', '=', $id)->get();
        return view('users.index')->with('user', $user)
                                    ->with('transactions', $transations)
                                    ->with('scroll', Category::find(1));


    }

    public function user_exchange($id) {
        $user = User::find($id);
        if(Auth::id() != $id)
        {
            return redirect()->route('index');
        }
        $transations = Transaction::where('user_id', '=', $id)->get();
        return view('users.history')->with('user', $user)
                                    ->with('transactions', $transations)
                                    ->with('scroll', Category::find(1));
    }

    public function permission_edit($id) 
    {
        $user = User::find($id);
        return view('admin.users.permission_edit')->with('user',$user);
    }
    public function permission_update(Request $request, $id) 
    {
        $user = User::find($id);
        $user->admin = $request->permission;
        $user->save();
        return redirect()->route('users');
    }


}
