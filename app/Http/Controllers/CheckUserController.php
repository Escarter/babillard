<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CheckUserController extends Controller
{
    public function checkUser()
    {
        $user = Auth::user();

        if (!$user->isInternal()) {
            return view('students.guest');
        }

        return view('students.complete-registration');
    }
}
