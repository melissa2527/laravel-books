<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::get();
        return view('genres/index', compact('genres'));
    }

    public function show($id) {

        return view('genres/show');
    }

    public function create() {

        return view('genres/create');
    }

    public function store(Request $request) {

    }
}
