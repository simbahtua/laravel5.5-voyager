<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\DB;
Use View;
class HomeController extends Controller
{
    function index() {
        //2 berita terbaru
        $data ['berita'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '2')
                ->where('STATUS', 'PUBLISHED')
                ->limit('2')
                ->orderBy('id', 'desc')
                ->get();
        
        //Berita random
        $data ['berita_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '2')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
        
        //2 artikel terbaru
        $data ['artikel'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '1')
                ->where('STATUS', 'PUBLISHED')
                ->limit('2')
                ->orderBy('id', 'desc')
                ->get();
        
        //Artikel random
        $data ['artikel_random'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '1')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->inRandomOrder()
                ->get();
        
        return \View::make('frontend.home.index',$data);
    }
    
    function page_detail(){
        return \View::make('frontend.home.detail');
    }
    
}
