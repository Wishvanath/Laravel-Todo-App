<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //define index method which you called in the demo route
   public function index(){
       return view('test');
   }
}
