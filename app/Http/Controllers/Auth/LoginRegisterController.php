<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginRegisterController extends Controller
{
    public function showRegisterAfterLogin()
    {
        return view('auth.register');
    }
}

