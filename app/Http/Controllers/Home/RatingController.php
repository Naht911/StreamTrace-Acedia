<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\StarRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function handle_rating(Request $request)
    {
        if (!Auth::user()) {
            return response()->json([
                'status' => -1,
                'message' => 'Please login first',
                'is_tracked' => false
            ]);
        }
        $id = $request->id ?? null;
        if ($id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Movie not found!',
                'is_tracked' => false
            ]);
        }
        $movie = Movie::find($id);
        if ($movie == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Movie not found!',
                'is_tracked' => false
            ]);
        }

        $rating = StarRating::where('movie_id', $id)
            ->where('user_id', Auth::id())
            ->first();
        if ($rating == null) {
            $rating = new StarRating;
            $rating->user_id = Auth::id();
            $rating->movie_id = $id;
            $rating->rating = $request->rating;
            $rating->save();
            return response()->json([
                'status' => 1,
                'message' => 'Rated successfully',
            ]);
        } else {
            $rating->rating = $request->rating;
            $rating->save();
        }
    }
}
