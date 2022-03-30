<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Index home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', []);
    }
}
