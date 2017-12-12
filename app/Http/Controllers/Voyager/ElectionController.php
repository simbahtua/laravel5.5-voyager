<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\Controller as VoyagerController;

class ElectionController extends VoyagerController
{
    function index() {
        // return view('data-pemilih.index');
        // echo 
        // return view('voyager::voters.import');
        Voyager::canOrFail('browse_media');
        
        return Voyager::view('voyager::voters.import');
    }


    function upload() {
        // Check permission
        Voyager::canOrFail('browse_media');
        return Voyager::view('voyager::voters.import');        
    }
}
