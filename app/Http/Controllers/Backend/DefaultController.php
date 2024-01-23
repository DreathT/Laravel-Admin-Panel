<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public $page = array();

    public function __construct(){

        // Blue bar on left side in app
        $this->page['blueBar'] = 'admin.index';

    }

    // route to default index page
    public function index(){

        return view('backend.default.index', $this -> page);

    }



}
