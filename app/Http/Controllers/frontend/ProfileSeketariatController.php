<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class ProfileSeketariatController extends Controller
{
    function index() {
        return \View::make('frontend.home.profile_seketariat');
    }
    
}
