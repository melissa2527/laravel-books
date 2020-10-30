<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // test to see how admin (as set) works
        // if (\Gate::allows('role', 'admin')) {
        //     dd('Yes, you are admin');
        // }

        // if (\Gate::allows('role', 'moderator')) {
        //     dd('Yes, are not admin, but you are a moderator');
        // }

        return view('home.index');
    }
}
