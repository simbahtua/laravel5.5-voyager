<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use View;
use DB;

class KontakController extends Controller {

    function index() {
        $data['page_title'] = 'Kontak Kami';

        $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.kontak', $data);
    }

}
