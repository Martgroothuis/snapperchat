<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function index()
    {
        return view('keys.index');
    }
    public function store()
    {
        return view('keys.index');
    }
    public function create()
    {
        return view('keys.create');
    }
}
