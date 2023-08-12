<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Reaction;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{

    public function get_reaction(Request $request)
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

        $reaction = Reaction::where('movie_id', $id)
            ->where('user_id', Auth::id())
            ->where('is_tracked', 1)
            ->first();
        if ($reaction) {
            return response()->json([
                'status' => 1,
                'message' => 'Add to watchlist successfully',
            ]);
        }
    }




    public function handle_reaction(Request $request)
    {
        if (!Auth::user()) {
            return response()->json([
                'status' => -1,
                'message' => 'Please login first',
                'is_thumbs_up' => false,
                'is_thumbs_down' => false,
                'is_tracked' => false,
            ]);
        }
        $id = $request->id ?? null; //check id
        $act = $request->act ?? null; //check action

        //check null
        if ($id == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Movie not found!',
                'is_thumbs_up' => false,
                'is_thumbs_down' => false,
                'is_tracked' => false,
            ]);
        }
        if($act == null){
            return response()->json([
                'status' => -1,
                'message' => 'Act less',
                'is_thumbs_up' => false,
                'is_thumbs_down' => false,
                'is_tracked' => false,
            ]);
        }
        //check null data
        $movie = Movie::find($id);
        if ($movie == null) {
            return response()->json([
                'status' => 0,
                'message' => 'Movie not found!',
                'is_thumbs_up' => false,
                'is_thumbs_down' => false,
                'is_tracked' => false,
            ]);
        }
        //check reaction table
        $reaction = Reaction::where('movie_id', $id)
            ->where('user_id', Auth::id())
            ->first();
        //nếu không tìm thấy bảng ghi trong database => tạo mới
        if ($reaction == null) {
            $reaction = new Reaction();
            $reaction->user_id = Auth::id();
            $reaction->movie_id = $id;
            if ($act == 'thumbs_up') {
                $reaction->is_thumbs_up = 1;
            }
            if ($act == 'thumbs_down') {
                $reaction->is_thumbs_down = 1;
            }
            if ($act == 'tracked') {
                $reaction->is_tracked = 1;
            }
            $reaction->save();

            return response()->json([
                'status' => 1,
                'message' => $act . ' successfully',
                'is_thumbs_down' => $act == 'thumbs_down',
                'is_thumbs_up' => $act == 'thumbs_up',
                'is_tracked' => $act == 'tracked',
            ]);
        } else {
            //nếu tìm thấy thì xử lý tùy tường hợp
            if ($act == 'tracked') {
                $reaction->is_tracked = abs($reaction->is_tracked - 1);
            } elseif ($act == 'thumbs_up') {
                //truong hop co thumb down
                if ($reaction->is_thumbs_down == 1) {
                    $reaction->is_thumbs_down = 0;
                }
                $reaction->is_thumbs_up = abs($reaction->is_thumbs_up - 1);
            } elseif ($act == 'thumbs_down') {
                //truong hop co thumb up
                if ($reaction->is_thumbs_up == 1) {
                    $reaction->is_thumbs_up = 0;
                }
                $reaction->is_thumbs_down = abs($reaction->is_thumbs_down - 1);
            }
            $reaction->save();
            return response()->json([
                'status' => 1,
                'message' => $act . ' successfully!',
                'is_thumbs_down' => $reaction->is_thumbs_down == 1,
                'is_thumbs_up' => $reaction->is_thumbs_up == 1,
                'is_tracked' => $reaction->is_tracked == 1,
            ]);
        }
    }
}
