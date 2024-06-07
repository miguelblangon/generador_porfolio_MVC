<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlantillaUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('porfolio.index');
    }
    public function create(){
        return view('porfolio.create');
    }
}
