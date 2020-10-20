<?php
 
namespace App\Http\Controllers;
 
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
 
class TestController extends Controller
{
    public function index()
    {
        $name = 'Melissa';
        $surname = 'Genger';
        $user = 'Melissa27';
        $age = 30;
       
        // first option
        // return view('test')->with('name', $name)->with('surname', $surname);
 
        // second option 
        // return view('test')->with(['name' => $name, 'surname' => $surname]);

        // third; newer option
        // return view('test', ['user' => $name, 'surname' => $surname]);

        // fourth; best option
        return view('test', compact('user', 'surname', 'age'));
    }
}