<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;
// use Intervention\Image\ImageManagerStatic as Img;
use Intervention\Image\Facades\Image as Img;
use App\Models\Movie;

class MovieController extends Controller
{

    public function create_movie()
    {
        $genres = Genre::all();
        $data = [
            'genres' => $genres
        ];

        return view('dashboard.movie.add_movie', $data);
    }

    public function store_movie(Request $request)
    {
        // dd($request->all());
        $title = $request->title ?? null;
        $original_title = $request->original_title ?? null;
        $slug = $request->slug ?? null;
        $genre = $request->genre ?? null; //array
        $duration = $request->duration ?? null;
        $release_year = $request->release_year ?? null;
        $poster = $request->poster ?? null; //image
        $trailer_url = $request->trailer_url ?? null;
        $synopsis = $request->synopsis ?? null;
        $language = $request->language ?? null;
        $country = $request->country ?? null;
        if (!$title || !$original_title || !$slug || !$genre || !$duration || !$release_year || !$poster || !$trailer_url || !$synopsis || !$language || !$country) {
            return response()->json(['status' => 0, 'message' => 'You must fill all the fields']);
        }
        //check title over 255 characters
        if (strlen($title) > 255) {
            return response()->json(['status' => 0, 'message' => 'Title is too long']);
        }
        //check original title over 255 characters
        if (strlen($original_title) > 255) {
            return response()->json(['status' => 0, 'message' => 'Original title is too long']);
        }
        //check slug over 255 characters
        if (strlen($slug) > 255) {
            return response()->json(['status' => 0, 'message' => 'Slug is too long']);
        }
        //check duration over 255 characters
        if (strlen($duration) > 255) {
            return response()->json(['status' => 0, 'message' => 'Duration is too long']);
        }
        //check release year from 1900 to 2024
        if ($release_year < 1900 || $release_year > 2024) {
            return response()->json(['status' => 0, 'message' => 'Release year is invalid']);
        }
        //check duplicate slug
        $check_slug = Movie::where('slug', $slug)->first();
        if ($check_slug) {
            return response()->json(['status' => 0, 'message' => 'Movie slug already exists']);
        }
        #upload image
        $image = $request->file('poster');
        //image name format: slug + time() + extension
        $image_name = $slug .'-'. time() . '.' . $image->getClientOriginalExtension();
        //image path
        $image_path = public_path('/uploads/images/poster/' . $image_name);
        $path = '/uploads/images/poster/' . $image_name;
        //resize image
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'gif', 'svg'];
        $extension = strtolower($image->getClientOriginalExtension());
        $check = in_array($extension, $allowedfileExtension);
        if (!$check) {
            // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
            return response()->json(array('status' => 0, 'message' => "Poster is not a valid image file!"));
        }
        $file_type = $image->getMimeType();
        if ($file_type != 'image/jpeg' && $file_type != 'image/png' && $file_type != 'image/jpg') {
            return response()->json(array('status' => 0, 'message' => "Poster is not a valid image file!"));
        }
        $image_resize = Img::make($image->getRealPath());
        // $image_resize->resize(300, 450);
        $image_resize->save($image_path);
        #end upload image
        //insert movie
        $movie = new Movie();
        $movie->title = $title;
        $movie->original_title = $original_title;
        $movie->slug = $slug;
        $movie->duration = $duration;
        $movie->release_year = $release_year;
        $movie->poster_url = $path ;
        $movie->trailer_url = $trailer_url;
        $movie->synopsis = $synopsis;
        $movie->language = $language;
        $movie->country = $country;
        $movie->save();
        //insert genre
        $movie->genres()->attach($genre);
        return response()->json(['status' => 1, 'message' => 'Add movie successfully']);
    }

    public function create_genre()
    {

        return view('dashboard.movie.create_genre');
    }
    public function store_genre(Request $request)
    {
        $name = $request->name;
        $slug = $request->slug;
        //check name over 255 characters
        if (strlen($name) > 255) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre name is too long'
            ]);
        }
        //check slug over 255 characters
        if (strlen($slug) > 255) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre slug is too long'
            ]);
        }
        $check_name = Genre::where('name', $name)->first();
        if ($check_name) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre name already exists'
            ]);
        }
        //check slug
        $check_slug = Genre::where('slug', $slug)->first();
        if ($check_slug) {
            return response()->json([
                'status' => 1,
                'message' => 'Genre slug already exists'
            ]);
        }


        $genre = new Genre();
        $genre->name = $name;
        $genre->slug = $slug;
        $genre->save();



        return response()->json([
            'status' => 1,
            'message' => 'Genre added successfully'
        ]);
    }
}
