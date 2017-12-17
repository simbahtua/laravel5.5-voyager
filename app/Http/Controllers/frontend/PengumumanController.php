<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
Use View;

class PengumumanController extends Controller {

    function index() {
        $data['page_title'] ='Pengumuman';
        $data ['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '3')
                ->where('STATUS', 'PUBLISHED')
                ->get();

        return \View::make('frontend.home.list_pengumuman', $data);
    }

    function detail($id) {
        $data['page_title'] = 'Detail Pengumuman';

        $data['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
//                ->join('*')
                ->where('posts.category_id', '3')
                ->where('posts.id', $id)
                ->where('STATUS', 'PUBLISHED')
                ->first();

        return \View::make('frontend.home.detail_pengumuman', $data);
    }

}
