<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class ProfileAnggotaController extends Controller
{
    function index() {
        $data['page_title'] ='Profil Anggota';
        return \View::make('frontend.home.profile_anggota', $data);
    }
    
}
