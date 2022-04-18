<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('layout.front');
    }
}
