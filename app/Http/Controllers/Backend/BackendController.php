<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function forgot_password()
    {
        return view('backend.forgot-password');
    }

    public function index()
    {
        return view('backend.index');
    }
}
