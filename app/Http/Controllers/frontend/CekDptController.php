<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataElection;
use App\DataElectionVoter as mVoter;

class CekDptController extends Controller
{
    function index() {
        // echo 'home';
        $listPemilu = DataElection::orderBy('tahun','DESC')->orderBy('id', 'DESC')->get();
        

        $listpemilu = array();
        if(!empty($listPemilu)) {
            foreach ($listPemilu as $row) :
                $listpemilu[$row->id] = $row->nama;
            endforeach;
        }

        $data['pemilu'] = $listpemilu;
        return View('frontend.home.cekdpt', $data);
    }
    

    public function checkList(Request $request)
    {
        $validatedData = $request->validate([
            'idPemilu' => 'required',
            'inpktp' => 'required|numeric',
        ]);
    
        $nik = $request->input('inpktp');
        $id = $request->input('idPemilu');
        $find = mVoter::where('election_voter_nik', '=', $nik)->where('election_id','=',$id)->first();
        $pemilu = DataElection::where('id','=',$id)->first();
        $pemilu = $pemilu['nama'];

        if(!empty($find)) {            
            $message = 'ANDA SUDAH TERDAFTAR DALAM DPS PEMILU '. $pemilu;
        }else {
            $message = 'ANDA BELUM TERDAFTAR DALAM DPS PEMILU '. $pemilu.'. SILAHKAN Menghubungi petugas PPS di daerah ANDA';
        }
        return \Redirect::route('cekdps')
        ->with('message', $message);
    }
}
