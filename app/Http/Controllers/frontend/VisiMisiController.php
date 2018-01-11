<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use View;
use DB;

class VisiMisiController extends Controller {

    function index() {
        $data['page_title'] = 'Visi Misi Komisi Pemilihan Umum';

        $data ['visimisi'] = DB::table('data_visions')
                ->orderBy('id', 'desc')
                ->get();

        return \View::make('frontend.home.visi_misi', $data);
    }

}
