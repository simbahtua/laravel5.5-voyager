<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use DB;
Use View;
class ProfileAnggotaController extends Controller
{
    function index() {
        $data['page_title'] ='Profil Anggota KPU Bantaeng';

        $data ['profile'] = DB::table('data_commisioners')                
                ->orderBy('id', 'desc')
                ->get();
        
        $data['kontak'] = DB::table('app_contacts')->first();

        return \View::make('frontend.home.profile_anggota', $data);
    }
    
}
