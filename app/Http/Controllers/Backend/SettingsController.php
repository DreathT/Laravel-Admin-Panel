<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{

    private $page= array();

    public function __construct(){

        $this->page['blueBar'] = 'settings.index';

    }

    public function index(){

        $data['adminSettings'] = Settings::all() -> sortBy('settings_must');

        return view('backend.settings.index',$this -> page,compact('data'));
    }

    // sort algorithm
    public function sortable() {

        foreach ($_POST['item'] as $key => $value) {

            $settings = Settings::find(intval($value));
            $settings -> settings_must =intval($key);
            $settings -> save();

        }

    }

    // delete the setting
    public function destroy($id) {

        $settings = Settings::find($id);
        if ($settings -> delete()) {
            return back() -> with("success", "Process Successful");
        }
        return back() -> with("error", "Process Failed");
    }

    // edit the setting
    public function edit($id) {

        $settings = Settings::where('id',$id) -> first();

        return view('backend.settings.edit',$this -> page) -> with('settings',$settings);

    }

    // updade the setting
    public function update(Request $request, $id) {

        if($request -> hasFile('settings_value')){

            $request -> validate([
                'settings_value' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            // set unique file name
            $file_name = uniqid().'.'.$request -> settings_value -> getClientOriginalExtension();
            $request -> settings_value -> move(public_path('images/settings'),$file_name);
            $request -> settings_value = $file_name;

        }

        $settings = Settings::where('id', $id) -> update(
            [
                "settings_value" => $request -> settings_value
            ]
        );

        // check old file and change with it
        if($settings){
            $path = 'images/settings/'.$request -> old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return back() -> with("success","Updated successfully");
        }
        return back() -> with("error", "Somethings is wrong!");
    }
}
