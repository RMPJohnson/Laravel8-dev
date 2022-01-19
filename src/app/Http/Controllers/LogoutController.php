<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LogoutController extends Controller
{
    public function index() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
