<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use DB;
Use View;
use App\Carbon\Carbon;

class AgendaController extends Controller {

    function index() {
        $data['page_title'] ='Artikel';
        
        $data ['data'] = DB::table('app_agendas')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('app_agendas.*', 'name')                                
                ->limit('5')
                ->orderBy('id', 'desc')
                ->get();
        
        $data ['agenda_random'] = DB::table('app_agendas')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('app_agendas.*', 'name')                                
                ->limit('5')
                ->orderBy('id', 'desc')
                ->inRandomOrder()
                ->get();

        return \View::make('frontend.home.list_agenda', $data);
    }

    function detail($id) {
        $data['page_title'] ='Detail Agenda';        
        
        $data ['data'] = DB::table('app_agendas')
                ->join('users', 'users.id', '=', 'author_id')
                ->select('app_agendas.*', 'name')                                
                ->where('app_agendas.id', $id)
                ->orderBy('id', 'desc')
                ->first();
        
//         $data ['agenda'] = DB::table('app_agendas')
//                ->join('users', 'users.id', '=', 'author_id')
//                ->select('app_agendas.*', 'name')                                
//                ->limit('5')
//                ->orderBy('id', 'desc')
//                ->get();
        

        return \View::make('frontend.home.detail_agenda', $data);
    }

}
