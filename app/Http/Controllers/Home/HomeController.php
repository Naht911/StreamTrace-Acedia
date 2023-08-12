<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $movies = Movie::where('name', 'like', '%' . $keyword . '%')->get();
        return view('home.search', compact('movies'));
    }

    public function movie_detail($id)
    {

        $movie = Movie::with('providers')->find($id);
        if ($movie == null) {
            return abort(404);
        }
        // dd($movie);
        $data = [
            'movie' => $movie,
        ];
        return view('home.movie.movie_detail', $data);
    }
    public function movie_detail_copy($id)
    {

        $movie = Movie::with('providers')->find($id);
        $reaction = Reaction::where('movie_id', $id)
            ->where('user_id', Auth::id())
            ->first();
        if ($movie == null) {
            return abort(404);
        }
        // dd($movie);
        $data = [
            'movie' => $movie,
            'reaction' =>$reaction,
        ];
        return view('home.movie.movie_detail_copy', $data);
    }
}
