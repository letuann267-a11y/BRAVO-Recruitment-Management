<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class VerifyMailController extends Controller
{
    public function sendMail(Request $request){
        $user = User::findOrFail($request->id);
        Mail::to($user-> email)-> send(new WelcomeMail($user));
        session()->flash('Verify_mail_sent', 'Please check your Mail box to Verify your Mail');
        return redirect('/')->with('resent', true);
    }

    public function verify(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        return redirect('/')->with('verified', true);
    }
}
