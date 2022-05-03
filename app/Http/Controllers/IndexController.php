<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends ParentController
{
    public function index()
    {
        if (Auth::user()->user_role == 2) {
            return redirect()->route('prescription.index');
        } else {
            return view('pages.index.index');
        }
    }
}
