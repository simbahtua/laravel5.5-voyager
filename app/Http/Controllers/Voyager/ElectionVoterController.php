<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;
// use App\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\Controller as VController;
use TCG\Voyager\Facades\Voyager;
use App\DataElection as mElection;
use App\DataElectionVoter as mVoter;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;



class ElectionVoterController extends VController
{

	function index() {
		return \Redirect::route('voyager.data-pemilu.index');
	}
	function browse(Request $request, $id) {				
		$find = mElection::where('id', '=', $id)->first();		
		if ($find) {

			$model = app('\\App\\DataElectionVoter');

			$getter = 'get';
			$search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];
			$searchable = '';
			$orderBy = $request->get('order_by');
			$sortOrder = $request->get('sort_order', null);

			
			// Check permission
			// $this->authorize('browse', $model);			

			$dataTypeContent = mVoter::where('election_id','=', $id)->get();

			$id = $id;
			
			$view = 'voyager::data-dps.browse';
			$title_add = $find['nama'];
			return Voyager::view($view, compact(
				'dataTypeContent',
				'search',
				'orderBy',
				'sortOrder',
				'searchable',
				'title_add',
				'id'
			));
			// return Voyager::view($view, $data);
		} else {
			$data = array (
				'message'    => 'Data Tidak Ditemukan',
				'alert-type' => 'error');
			return \Redirect::route('voyager.data-pemilu.index')
			->with($data);
		}		
	}

	public function show(Request $request, $id) {
		$find = mElection::where('id', '=', $id)->first();		
		if ($find) {
			
		} else {
			$data = array (
				'message'    => 'Data Tidak Ditemukan',
				'alert-type' => 'error');
			return \Redirect::route('voyager.data-pemilu.index')
			->with($data);
		}		
	}

	function upload(Request $request, $id) {

		$this->validate($request, array(
			'file'      => 'required'
		));
		if($request->hasFile('file')){
			$path = $request->file('file')->getRealPath();
			$extension = $request->file->getClientOriginalExtension();

			if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
				$date = date('YmdHis');
				$filename = 'data_dps-'.$id.'-'.$date. '.' . $extension;
				$path = 'data-dps';
				$request->file->storeAs(
					$path,
					$filename,
					config('voyager.storage.disk', 'public')
				);

				$upload_path = config('voyager.storage.disk', 'public');
				$filepath = $upload_path. '\\'.'storage'.'\\'.$path.'\\'.$filename;
				$realpath = $request->file->getRealPath();
				$data = Excel::load($filepath, function($reader) {
				})->get();

				if(!empty($data) && $data->count()){
					$failed = 0;
					$success = 0 ;
					$unimported = 0;

					foreach ($data as $key => $value) {

						if(! empty($value->nik) && !empty($value->nama)) {
							$isExist = mVoter::where('nik', $value->nik)->where('election_id', $id)->first();

							if(empty($isExist)) {
								$success++;	
								$dataImported[] = [
									'no_kk' => $value->no_kk,
									'nik' => $value->nik,
									'nama' => $value->nama,
									'alamat' => $value->nama,
									'rt' => $value->rt,
									'rw' => $value->rw,
									'kelurahan' => $value->kelurahan,
									'kecamatan' => $value->kecamatan,
									'election_id' => $id
								];
							} else {
								$unimported++;
							}

						}else {
							$failed++;
						}
					}
				}

				if(!empty ($dataImported)) {
					mVoter::insert($dataImported);
					$update =['jumlah_dps' => $success];
					mElection::	where('id',$id)->increment('jumlah_dps', $success);
					$data = array(
						'message' => 'UPLOAD DATA BERHASIL, '. $success .' Data DPS berhasil disimpan, '. $failed . ' Data DPS Gagal Disimpan . '. $unimported .' Data sudah terdaftar',
						'alert-type' => 'success'
					);
					return redirect()->route("voyager.data-dps.show",['id' => $id])->with($data);

				} else {
					unlink(public_path('storage').'/data-dps'.'/'.$filename);
					$data = array(
						'message' => 'UPLOAD DATA Gagal, Data yang anda upload sudah terdaftar ',
						'alert-type' => 'error'
					);
					return redirect()->route("voyager.data-dps.import",['id' => $id])->with($data);
				}
								
			} else {
				$data = array(
					'message' => 'Ekstensi File Tidak di ijinkan, ekstensi yang diijinkan adalah xls/csv',
					'alert-type' => 'error'
				);
				return redirect()->route("voyager.data-dps.import",['id' => $id])->with($data);
			}
			
		} else {
			$data = array(
				'message' => 'ANDA BELUM MENGUPLOAD FILE',
				'alert-type' => 'error'
			);

			return redirect()->route("voyager.data-dps.import",['id' => $id])->with($data);
		}
		
	}

	function create(Request $request, $id) {
		if(!isset(($id))) {
			echo 'fail';
		} else {
			echo 'create';
		}
	}

	function import(Request $request, $id) {
		$find = mElection::where('id', '=', $id)->first();		
		if ($find) {
			$view = 'voyager::data-dps.uploaddps';
			$title_add = $find['nama'];
			$id = $id;

			return Voyager::view($view, compact(
				'title_add','id'
			));
		} else {
			$data = array (
				'message'    => 'Data Tidak Ditemukan',
				'alert-type' => 'error');
			return \Redirect::route('voyager.data-pemilu.index')
			->with($data);
		}
	}
}
