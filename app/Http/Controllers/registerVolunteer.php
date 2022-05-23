<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerVolunteer extends Controller
{
    public function index()
    {
        return view('auth.registerVolunteer');
    }
}
