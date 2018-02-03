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
    	cModel::create($request->all());
    	
		$data = array (
				'message'    => 'Data Berhasil Disimpan',
				'alert-type' => 'success');
			return \Redirect::route('voyager.contact-us.index')
			->with($data);
	}

	function update(Request $request) {
		$id = $request['id'];

		$contact = cModel::findOrFail($id);
		$contact->instagram = $request['alamat'];
		$contact->facebook = $request['facebook'];
		$contact->twitter = $request['twitter'];
		$contact->instagram = $request['instagram'];
		$contact->phone = $request['phone'];
		$contact->email = $request['email'];
		$contact->save();

		$data = array (
				'message'    => 'Data Berhasil Disimpan',
				'alert-type' => 'success');
			return \Redirect::route('voyager.contact-us.index')
			->with($data);
	}
}
