<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\URL;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DB;
Use View;

class HomeController extends Controller {

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

        //Pengumuman
        $data ['pengumuman'] = DB::table('posts')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('posts.*', 'name')
                ->where('category_id', '3')
                ->where('STATUS', 'PUBLISHED')
                ->limit('5')
                ->orderBy('id', 'desc')
                ->get();

        //Gallery
        $data ['gallery'] = DB::table('app_galleries')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('app_galleries.*', 'name')
                ->where('status', 'published')
                ->limit('5')
                ->orderBy('id', 'desc')
                ->get();

        //Agenda
        $data ['agenda'] = DB::table('app_agendas')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('app_agendas.*', 'name')
                ->limit('5')
                ->orderBy('id', 'desc')
                ->get();

        //Dokumen
        $data ['dokumen'] = DB::table('app_documents')
                ->select('*')
                ->limit('5')
                ->orderBy('id', 'desc')
                ->get();

        $data ['slider'] = DB::table('app_page_sliders')
                ->select('*')
                ->where('status', 'published')
                ->orderBy('id', 'desc')
                ->get();

        return \View::make('frontend.home.index', $data);
    }

    function page_detail() {
        return \View::make('frontend.home.detail');
    }

//    function download_file($id) {
//
//        $data = DB::table('app_documents')
//                ->select('filename')
//                ->where('id', $id)
//                ->first();
//        foreach ($data as $row) {
//
//            $file = json_decode($row);
//            $download_link = $file[0]->download_link;
//            
//            $path = url('/') . '/storage/' . $download_link;
//
//            return response()->download($path, $headers);
//        }
//    }
}
