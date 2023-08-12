<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\StreamingServiceProvider;
use Illuminate\Http\Request;

class PopularController extends Controller
{
    public function list_popular(Request $request)
    {
        //search filter
        $relations = ['providers', 'genres', 'providers_distinct'];
        $name = trim($request->name ?? null);
        $genre = trim($request->genre ?? null);
        $provider =  trim($request->provider ?? null);
        $providerCountry = trim($request->provider_country ?? null);
        $movies = Movie::query()->with($relations);

        $arr = $request->arr ?? null;

        // dd($request->all());
        // $movies = $movies->whereIn('providers', $arr)->get();

        // if ($arr) {
        //     foreach ($arr as $tag) {
        //         // $movies = $movies::whereHas('providers', '=', $tag);
        //         $movies = $movies->whereHas('providers', function ($q) use ($tag) {

        //             $q->where('providers', 'like', '%' . $tag . '%');
        //         });
        //     }
        // }

        // $query = Movie::query();
        // foreach ($arr as $tag) {
        //     $movies = $movies::whereHas('providers', function ($q) use ($tag) {
        //         $q->where('providers', 'like', '%' . $tag . '%');
        //     });
        // };
        // $movies->get();




        $per_page = $request->per_page ?? 20;
        if ($name  && $name != null && $name != '' && !empty($name)) {

            $movies = $movies->where('title', 'like', '%' . $name . '%');
        }
        if ($genre && $genre != null && $genre != '' && !empty($genre)) {

            if ($genre != 'none') {
                $movies = $movies->whereHas('genres', function ($q) use ($genre) {
                    $q->where('slug', $genre);
                });
            } else {
                $movies = $movies->doesntHave('genres');
            }
        }


        if ($providerCountry && $providerCountry != null && $providerCountry != '' && !empty($providerCountry)) {
            $movies = $movies->whereHas('providers', function ($q) use ($providerCountry) {
                $q->where('country', 'like', '%' . $providerCountry . '%');
            });
        }

        $soft = $request->soft ?? null;
        if ($soft != null) {
            if ($soft == 'asc') {
                $soft_data = (object)[
                    'name' => 'Oldest first',
                    'reverse_name' => 'Newest first',
                    'slug' => 'asc',
                    'reverse_slug' => 'desc'
                ];
            } else {
                $soft_data = (object)[
                    'name' => 'Newest first',
                    'reverse_name' => 'Oldest first',
                    'slug' => 'desc',
                    'reverse_slug' => 'asc'
                ];
            }
            session()->put('soft_data', $soft_data);
        } else {
            //check session
            if (session()->has('soft_data')) {
                $soft_data = session()->get('soft_data');
            } else {
                //create session
                $soft_data = (object)[
                    'name' => 'Newest first',
                    'reverse_name' => 'Oldest first',
                    'slug' => 'desc',
                    'reverse_slug' => 'asc'
                ];
                session()->put('soft_data', $soft_data);
            }
        }
        $movies = $movies->orderBy('id', $soft_data->slug);


        $movies = $movies->paginate($per_page);
        //handle provider filter



        // dd($movies);
        //add query string to pagination links
        $movies->appends(request()->query());
        $genres = Genre::all();
        $providers = StreamingServiceProvider::all();
        $providerCountries  = Movie::pluck('country')->unique();


        $data = [
            'genres' => $genres,
            'movies' => $movies,
            'providers' => $providers,
            'providerCountries' => $providerCountries,
            'soft_data' => $soft_data

        ];
        return view('home.popular', $data);
    }

    public function filter_popular(Request $request)
    {
        //search filter
        dd($request->all());
        $relations = ['providers', 'genres', 'providers_distinct'];
        $arr = $request->arr ?? null;
        $name = $arr['name'] ?? null;
        $movies = Movie::query()->with($relations);

        if ($arr) {
            foreach ($arr as $tag) {
                // $movies = $movies::whereHas('providers', '=', $tag);
                $movies = $movies->whereHas('providers', function ($q) use ($tag) {

                    $q->where('providers', 'like', '%' . $tag . '%');
                });
            }
        }


        // $data = [
        //     'genres' => $genres,
        //     'movies' => $movies,
        //     'providers' => $providers,
        //     'providerCountries' => $providerCountries,
        //     'soft_data' => $soft_data

        // ];
        // return view('home.popular', $data);
    }
}
