<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class VisiMisiController extends Controller
{
    function index() {
        $data['page_title'] = 'Visi Misi KPU';
        
        return \View::make('frontend.home.visi_misi', $data);
    }
    
}
