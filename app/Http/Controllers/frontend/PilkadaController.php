<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use View;

class PilkadaController extends Controller {

    function index() {
        $data['page_title'] ='Info Pilkada';
        
        $data ['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '4')
                ->where('STATUS', 'PUBLISHED')
                ->orderBy('id', 'desc')
                ->paginate(5);
        
         $data ['pilkada_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '4')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
         
         $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.list_pilkada', $data);
    }

    function detail($id) {  
        $data['page_title'] ='Detail Info Pilkada';
        
        //Berita random
        $data ['pilkada_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '4')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
        
        $data['data'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('posts.category_id', '4')
                ->where('posts.id', $id)
                ->where('STATUS', 'PUBLISHED')
                ->first();
        
        $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.detail_pilkada', $data);
    }

}
