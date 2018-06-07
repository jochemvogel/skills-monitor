<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showChangePasswordForm() {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request) {
        // The passwords matches
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        
        //Current password and new password are same
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        DB::table('users')->where('id',Auth::User()->id)->update([
            "password" => bcrypt($request->get('new-password')),
        ]);

        Mail::send('mail.pwchange', [], function($message){
            $message->to(Auth::User()->email, Auth::User()->firstname." ".Auth::User()->lastname)->subject('Your password has been changed!');
        });
        
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
