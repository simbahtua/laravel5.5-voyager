<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Http\Controllers\Controller as VController;
use TCG\Voyager\Facades\Voyager;

use App\Models\voyager\AppContact as cModel;

class ContactUsController extends VController
{
	function index(Request $request) {		
		$data = cModel::orderBy('created_at', 'desc')->first();
		return Voyager::view('voyager::contacts.show',compact('data'));	
	}



	function store(Request $request) {
		if ($request->isMethod('post')) {
    		cModel::create($request->all());
		}

		if ($request->isMethod('put')) {
			// $data = cModel::orderBy('created_at', 'desc')->first();
    		cModel::where('id', $request->input('id'))->update(array(
    			'alamat' => $request->input('alamat'),
    			'phone' => $request->input('phone'),
    			'instagram' => $request->input('instagram'),
    			'facebook' => $request->input('facebook'),
    			'twitter' => $request->input('twitter'),
    			'description' => $request->input('description'),
    		));
		}

		$data = array (
				'message'    => 'Data Berhasil Disimpan',
				'alert-type' => 'success');
			return \Redirect::route('voyager.contact-us.index')
			->with($data);
	}
}
