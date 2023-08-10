<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function add()
    {

        return view('dashboard.movie.add_movie');
    }

    public function create_genre()
    {

        return view('dashboard.movie.create_genre');
    }

}
