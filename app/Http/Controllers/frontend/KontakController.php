<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class KontakController extends Controller
{
    function index() {
        $data['page_title'] ='Cek Data Pemilih';
        return \View::make('frontend.home.kontak', $data);
    }
    
}
