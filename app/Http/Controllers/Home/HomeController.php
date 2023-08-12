<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use App\Models\MovieProvider;
use App\Models\MovieTracking;

class HomeController extends Controller
{
    public function index()
    {
        $relations = ['genres', 'providers', 'providers_distinct'];
        $movies = Movie::query()->with($relations);
        $top_ten = $movies->orderBy('count_view', 'desc')->take(10)->get();
        $new_ten = Movie::orderBy('created_at', 'desc')->take(20)->get();
        $movies = $movies->get();

        $data = [
            'movies' => $movies,
            'top_ten' => $top_ten,
            'new_ten' => $new_ten,
        ];

        return view('home.index', $data);
    }
    public function wathchlist()
    {
        //get all movie in watchlist
        $reaction = request()->reaction;

        $relations = ['movie'];
        $wathchlist = Reaction::query()->with($relations);
        $wathchlist = $wathchlist->where('user_id', Auth::id());
        $list_copy = $wathchlist->get();
        $count_tracked = $list_copy->where('is_tracked', 1)->count();
        $count_watched = $list_copy->where('is_watched', 1)->count();
        $count_thumbs_up = $list_copy->where('is_thumbs_up', 1)->count();
        $count_thumbs_down =  $list_copy->where('is_thumbs_down', 1)->count();
        if ($reaction != null) {
            switch ($reaction) {
                case 'tracked':
                    $wathchlist = $wathchlist->where('is_tracked', 1);
                    break;
                case 'watched':
                    $wathchlist = $wathchlist->where('is_watched', 1);
                    break;
                case 'thunbs_up':
                    $wathchlist = $wathchlist->where('is_thumbs_up', 1);
                    break;
                case 'thunbs_down':
                    $wathchlist = $wathchlist->where('is_thumbs_down', 1);
                    break;
            }
        }


        // $wathchlist = $wathchlist->orderBy('id', 'desc');
        $wathchlist = $wathchlist->paginate(20);

        // dd($wathchlist);
        $data = [
            'wathchlist' => $wathchlist,
            'count_tracked' => $count_tracked,
            'count_watched' => $count_watched,
            'count_thumbs_up' => $count_thumbs_up,
            'count_thumbs_down' => $count_thumbs_down,

        ];

        return view('home.wathchlist', $data);
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
        $reaction = Reaction::where('movie_id', $id)
            ->where('user_id', Auth::id())
            ->first();
        if ($movie == null) {
            return abort(404);
        }
        $data = [
            'movie' => $movie,
            'reaction' => $reaction,
        ];
        $movie->count_view = $movie->count_view + 1;
        $movie->save();
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
            'reaction' => $reaction,
        ];
        return view('home.movie.movie_detail_copy', $data);
    }

    public function outsite(Request $request, $movie_id)
    {
        $url = $request->url;
        $movie = Movie::find($movie_id);
        if ($movie == null) {
            return abort(404);
        }
        $movie_provider = MovieProvider::where('movie_id', $movie_id)
            ->where('url', $url)
            ->first();
        $tracking = MovieTracking::where('movie_id', $movie_id)->first();
        if ($tracking == null) {
            $tracking = new MovieTracking();
            $tracking->movie_id = $movie_id;
            if ($movie_provider != null) {
                $tracking->streaming_service_provider_id = $movie_provider->streaming_service_provider_id;
            }
            $tracking->count = 1;
            $tracking->save();
        } else {
            $tracking->count = $tracking->count + 1;
            $tracking->save();
        }
        return redirect()->away($url);
        // return view('home.outsite');
    }
}
