<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class KontakController extends Controller
{
    function index() {
        return \View::make('frontend.home.kontak');
    }
    
}
