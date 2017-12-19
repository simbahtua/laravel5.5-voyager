<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use View;

class GalleryController extends Controller {

    function index() {
        $data['page_title'] = 'Gallery';
        
        $data ['gallery'] = DB::table('app_galleries')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('app_galleries.*', 'name')
                ->where('status', 'published')
                ->orderBy('id', 'desc')
                ->paginate(6);


        return \View::make('frontend.home.list_gallery', $data);
    }

}
