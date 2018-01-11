<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use DB;
Use View;


class SejarahkpuController extends Controller {

    function index() {
        $data['page_title'] = 'Sejarah Pemilu';

        $data ['sejarahpemilu'] = DB::table('data_sejarah_pemilus')                
                ->orderBy('id', 'desc')
                ->get();


        return \View::make('frontend.home.sejarahkpu', $data);
    }

}
