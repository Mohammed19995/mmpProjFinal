<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MosqueCon extends Controller
{
    //



    public function addMosque() {
        return view('admin.mosque.addMosque');
    }
}
