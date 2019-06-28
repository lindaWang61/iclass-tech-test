<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Models\Employees;

use Illuminate\Http\Request;

class PageController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show(Request $req)
    {
        $page =  $req->input("page", "1");
        $per =  $req->input("per", "10");
        $search = $req->input("search", "");




        $items = Employees::paginate($per);


        return view("index", ["items" => $items]);
    }
}
