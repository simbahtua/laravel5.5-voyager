<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class DokumenController extends Controller
{
    function index() {
        return \View::make('frontend.home.list_dokumen');
    }
    
}
