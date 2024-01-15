<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

class CustomFeatureController extends Controller
{

    public function defaultIndex() {

//        $blueBar = 'admin.index';
        $page = new DefaultController();
        return $page -> index();


    }

    public function settingsIndex() {

//        $blueBar = 'settings.index';
        $page = new SettingsController();
        return $page -> index();

    }

//    settingsEdit passive because $id necessary for him as like settingsDestroy and settingsUpdate

//    public function settingsEdit() {
//
//        $blueBar = 'settings.index';
//        $page = new SettingsController($blueBar);
//        return $page -> edit();

//    }


}
