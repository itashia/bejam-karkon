<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public Setting $settings;
    
    public function index()
    {
        return view("welcome" );
    }
}
