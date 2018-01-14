<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use View;
use App\Carbon\Carbon;

class ArtikelController extends Controller {

    function index() {
        $data['page_title'] ='Artikel';
        
        $data['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '1')
                ->where('STATUS', 'PUBLISHED')
                ->orderBy('id', 'desc')
                ->paginate(5);
        
        $data ['artikel_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '1')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
        
        $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.list_artikel', $data);
    }

    function detail($id) {
        $data['page_title'] ='Detail Artikel';        
        
        $data['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('posts.category_id', '1')
                ->where('posts.id', $id)
                ->where('STATUS', 'PUBLISHED')
                ->first();
        
        $data ['artikel_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '1')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
        
        $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.detail_artikel', $data);
    }

}
