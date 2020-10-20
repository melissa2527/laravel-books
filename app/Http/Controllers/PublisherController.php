<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index() {
        $publishers = Publisher::get();
        return view('publishers/index', compact('publishers'));
    }

    public function show($id) {
      $publisher = DB::table('publishers')->where('id', $id)->first();
      $publisher_id = DB::table('books')->where('publisher_id', $id)->get();
      return view('publishers/show', compact('publisher', 'publisher_id'));


    }
}
