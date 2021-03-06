<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use View;

class BeritaController extends Controller {

    function index() {
        $data['page_title'] ='Berita';
        
        $data ['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '2')
                ->where('STATUS', 'PUBLISHED')
                ->orderBy('id', 'desc')
                ->paginate(5);
        
         $data ['berita_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '2')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
         
         $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.list_berita', $data);
    }

    function detail($id) {  
        $data['page_title'] ='Detail Berita';
        
        //Berita random
        $data ['berita_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '2')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
        
        $data['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('posts.category_id', '2')
                ->where('posts.id', $id)
                ->where('STATUS', 'PUBLISHED')
                ->first();
        
        $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.detail_berita', $data);
    }

}
