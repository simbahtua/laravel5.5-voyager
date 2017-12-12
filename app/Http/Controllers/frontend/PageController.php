<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
Use View;
class PageController extends Controller
{
    function index() {
        // echo 'home';
        
//        $data['home'] = 'ini adalah home';
        
        return \View::make('frontend.home.detail');
    }
    
//    function page_detail(){
//        return \View::make('frontend.home.detail');
//    }
    
}
