<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    //
    public function settings() {
        return view('onboading', [
            'id' => Auth::user()->id
        ]);
    }
}
