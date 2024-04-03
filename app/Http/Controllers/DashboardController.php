<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    function index()
    {
        return view('dashboard');
    }
}
