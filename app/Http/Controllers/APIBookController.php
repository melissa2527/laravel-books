<?php
 
namespace App\Http\Controllers;
 
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class APIBookController extends Controller
{
    public function index()
    {
        // return 'Hello world';
        $books = DB::select('SELECT * FROM `books`');

        header('Content-type: application/json');
        
        echo json_encode($books);

        // the logic of your api will be here
 
    }
}