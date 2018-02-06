<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller as VController;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Validator;

use App\Models\voyager\HomeSlider as sModel;

class SliderHome extends VController
{
    function index(Request $request) {
		$sliders = sModel::orderBy('order', 'asc')->get();
		$view = 'voyager::slider-home.browse';
		return Voyager::view($view, compact(
			'sliders'
		));
    }

    function create(Request $request) {

        return Voyager::view('voyager::slider-home.create');
    }

    function store(Request $request) {

        $rules = array('title' => 'required|string',
        'type' => 'required|string');

        if($request['type'] == 'image') {
            $rules['image_file'] = 'required|image|mimes:jpeg,png,jpg';
        }else {
            $rules['video_url'] = 'required|url';
        }

        $this->validate($request, $rules);

        $data['title'] = $request->input('title');
        $data['type'] = $request->input('type');
        if($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $path = 'slider-home/'.date('F').date('Y').'/';
            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).'-'.date('YmdHis');
            $full_filename = $filename.'.'.$file->getClientOriginalExtension();
            $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();
            
            $file->storeAs(
                $path,
                $full_filename,
                config('voyager.storage.disk', 'public')
            );
            $data['value'] = $fullPath;
        }else {
            $data['value'] = $request['video_url'];
        }            

        $data['order'] = sModel::highestOrderMenuItem();
        sModel::create($data);
        $data = array (
                'message'    => 'Data Berhasil Disimpan',
                'alert-type' => 'success');
        return \Redirect::route('voyager.slider-home.index')->with($data);
        
    }

    public function delete($id) {
        $item = sModel::findOrFail($id);
        $item_value = $item->value;
        
        if($item->type == 'image') {
            $this->deleteFileIfExists($item_value);
        }

        $item->destroy($id);
        return redirect()
            ->route('voyager.slider-home.index')
            ->with([
                'message'    => 'Slider Berhasil Dihapus',
                'alert-type' => 'success',
            ]);
    }

    public function order_item(Request $request)
    {
        $menuItemOrder = json_decode($request->input('order'));

        $this->orderMenu($menuItemOrder, null);
    }

    private function orderMenu(array $menuItems)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = sModel::findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->save();

            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }
}
