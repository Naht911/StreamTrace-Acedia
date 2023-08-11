<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;
// use Intervention\Image\ImageManagerStatic as Img;
use Intervention\Image\Facades\Image as Img;
use App\Models\Movie;
use App\Models\StreamingServiceProvider;
use App\Models\MovieProvider;
use App\Models\TypePrice;
use App\Models\MovieResolution;

class MovieController extends Controller
{
    public function list_movie(Request $request)
    {
        //search filter
        $relations = ['providers', 'genres', 'providers_distinct'];
        $name = trim($request->name ?? null);
        $genre = trim($request->genre ?? null);
        $provider =  trim($request->provider ?? null);



        $movies = Movie::query()->with($relations);
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
        if ($provider && $provider != null && $provider != '' && !empty($provider)) {

            if ($provider != 'none') {
                $movies = $movies->whereHas('providers', function ($q) use ($provider) {

                    $q->where('name', 'like', '%' . $provider . '%');
                });
            } else {

                $movies = $movies->doesntHave('providers');
            }
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

        $data = [
            'genres' => $genres,
            'movies' => $movies,
            'providers' => $providers,
            'soft_data' => $soft_data

        ];
        return view('dashboard.movie.list_movie', $data);
    }
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
        $image_name = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
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
        checkAndCreateFolder('/uploads/images/poster/');
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
        $movie->poster_url = $path;
        $movie->trailer_url = $trailer_url;
        $movie->synopsis = $synopsis;
        $movie->language = $language;
        $movie->country = $country;
        $movie->save();
        //insert genre
        $movie->genres()->attach($genre);
        return response()->json(['status' => 1, 'message' => 'Add movie successfully']);
    }

    public function edit_movie($id = null)
    {
        if (!$id) {
            return redirect()->route('dashboard.movie.list_movie');
        }
        $relations = ['providers', 'genres', 'providers_distinct'];
        $movie = Movie::with($relations)->find($id);
        if (!$movie) {
            return redirect()->route('dashboard.movie.list_movie');
        }
        $genres = Genre::all();
        $data = [
            'genres' => $genres,
            'movie' => $movie
        ];
        return view('dashboard.movie.edit_movie', $data);
    }

    public function update_movie(Request $request, $id = null)
    {
        if (!$id) {
            return response()->json(['status' => 0, 'message' => 'Movie not found']);
        }
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['status' => 0, 'message' => 'Movie not found']);
        }
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
        if (!$title || !$original_title || !$slug || !$genre || !$duration || !$release_year || !$trailer_url || !$synopsis || !$language || !$country) {
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
        if ($check_slug && $check_slug->id != $id) {
            return response()->json(['status' => 0, 'message' => 'Movie slug already exists']);
        }
        if ($poster != null) {
            #upload image
            $image = $request->file('poster');
            //image name format: slug + time() + extension
            $image_name = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            //image path
            $image_path = public_path('/uploads/images/poster/' . $image_name);
            $path = '/uploads/images/poster/' . $image_name;
            checkAndCreateFolder('/uploads/images/poster/');
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
        } else {
            $path = $movie->poster_url;
        }

        $movie->title = $title;
        $movie->original_title = $original_title;
        $movie->slug = $slug;
        $movie->duration = $duration;
        $movie->release_year = $release_year;
        $movie->poster_url = $path;
        $movie->trailer_url = $trailer_url;
        $movie->synopsis = $synopsis;
        $movie->language = $language;
        $movie->country = $country;
        $movie->save();
        //update genre
        $movie->genres()->sync($genre); //tự động xóa các genre cũ và thêm các genre mới
        return response()->json(['status' => 1, 'message' => 'Update movie successfully']);
    }

    public function delete_movie(Request $request)
    {

        $id = $request->id ?? null;
        if (!$id) {
            return response()->json(['status' => 0, 'message' => 'Movie not found']);
        }
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['status' => 2, 'message' => 'Movie not found or deleted!']);
        }
        $movie->delete();
        return response()->json(['status' => 1, 'message' => 'Delete movie successfully']);
    }

    public function list_genre()
    {
        $per_page = 10;
        $genres = Genre::query()->with('movies')->paginate($per_page);
        $data = [
            'genres' => $genres
        ];

        return view('dashboard.movie.list_genre', $data);
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

    public function edit_genre($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return redirect()->route('list_genre');
        }
        $data = [
            'genre' => $genre
        ];
        return view('dashboard.movie.edit_genre', $data);
    }

    public function update_genre(Request $request, $id = null)
    {

        $name = $request->name;
        $slug = $request->slug;
        if ($id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre not found'
            ]);
        }
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre not found!'
            ]);
        }
        if ($name == null || $slug == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre name or slug is empty'
            ]);
        }
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
        if ($check_name && $check_name->id != $id) {
            return response()->json([
                'status' => 0,
                'message' => 'Genre name already exists!'
            ]);
        }
        //check slug
        $check_slug = Genre::where('slug', $slug)->first();
        if ($check_slug && $check_slug->id != $id) {
            return response()->json([
                'status' => 1,
                'message' => 'Genre slug already exists'
            ]);
        }
        if ($genre->name == $name && $genre->slug == $slug) {
            return response()->json([
                'status' => 1,
                'message' => 'Nothing change'
            ]);
        }

        $genre->name = $name;
        $genre->slug = $slug;
        $genre->save();

        return response()->json([
            'status' => 1,
            'message' => 'Genre updated successfully'
        ]);
    }

    public function delete_genre(Request $request)
    {
        $id = $request->id ?? null;
        if (!$id) {
            return response()->json(['status' => 0, 'message' => 'Genre not found']);
        }
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['status' => 2, 'message' => 'Genre not found or deleted!']);
        }
        $genre->delete();
        return response()->json(['status' => 1, 'message' => 'Delete genre successfully']);
    }

    public function show_movie_provider(Request $request, $movie_id = null)
    {
        $movie = Movie::find($movie_id);
        if (!$movie) {
            return abort(404);
        }
        $providers = StreamingServiceProvider::all();
        $type_price = TypePrice::all();
        $movie_resolutions = MovieResolution::all();
        $movie_providers = MovieProvider::where('movie_id', $movie_id)->get(); //just use for update
        $data = [
            'movie' => $movie,
            'providers' => $providers,
            'type_price' => $type_price,
            'movie_resolutions' => $movie_resolutions,
            'movie_providers' => $movie_providers
        ];
        return view('dashboard.movie.show_movie_provider', $data);
    }

    public function add_movie_provider(Request $request, $movie_id = null)
    {
        $movie = Movie::find($movie_id);
        if (!$movie) {
            return abort(404);
        }
        $providers = StreamingServiceProvider::all();
        $type_price = TypePrice::all();
        $movie_resolutions = MovieResolution::all();
        $movie_providers = MovieProvider::where('movie_id', $movie_id)->get(); //just use for update
        $data = [
            'movie' => $movie,
            'providers' => $providers,
            'type_price' => $type_price,
            'movie_resolutions' => $movie_resolutions
        ];
        return view('dashboard.movie.add_movie_provider', $data);
    }
}
