<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Serial;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::all();
        $serials = Serial::all();

        return view('home',compact('films','serials'));
    }
}
