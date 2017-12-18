<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
Use View;

class SejarahkpuController extends Controller {

    function index() {
        $data['page_title'] = 'Sejarah KPU';

        return \View::make('frontend.home.sejarahkpu', $data);
    }

}
