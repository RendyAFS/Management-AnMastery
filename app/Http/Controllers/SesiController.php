<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function index(){{
        return view('welcome');
    }}

    // public function indexadmin(){{
    //     return view('admin.dashboard');
    // }}

    public function indexuser(){{
        return view('user.index');
    }}
}
