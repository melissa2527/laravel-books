<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Modes\Category;

class SubcategoryController extends Controller
{
    public function index() {
        return view('subcategories/index');
    }
}
