<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
Use View;

class DokumenController extends Controller
{
    function index() {
        $data['page_title'] ='Dokumen';
        
        $data ['dokumen'] = DB::table('app_documents')
                ->select('*')
                ->limit('5')
                ->orderBy('id', 'desc')
                ->paginate(10);
        
        $data['kontak'] = DB::table('app_contacts')->first();
        
        return \View::make('frontend.home.list_dokumen', $data);
    }
    
}
