<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestEnrollment;

use Illuminate\Http\Request;

class TestEnrollmentController extends Controller
{
    public function sendTestNotification(){
        $user = auth()->user();

        $enrollmentData = [
            'body'=>'You received a new notification',
            'enrollmentText'=>'You are allowed to enroll',
            'url'=>url('/'),
            'thankyou'=>'You have 14 days'
        ];
        $user->notify(new TestEnrollment($enrollmentData));
    }
}
