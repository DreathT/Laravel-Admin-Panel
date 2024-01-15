<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public $page = array();

    public function __construct(){

        $this->page['blueBar'] = 'admin.index';

    }

    public function index(){

        return view('backend.default.index', $this -> page);

    }



}
