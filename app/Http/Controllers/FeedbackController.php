<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class FeedbackController extends Controller
{
    function feedback()
    {

        return view('home/feedback');
    }
    public function showAll()
    {
        $feedback = feedback::all();
        $feedback2 = feedback::all();

        if ($feedback) {
            return view('dashboard.feedback.viewfeedback')->with(
                [
                    'data' =>
                    $feedback,
                    'data2' =>
                    $feedback2

                ]
            );
        }
    }


    public function store(Request $request)
    {
        if ($request) {
            $check =  feedback::create([
                'title' => $request->title,
                'email' => $request->email,
                'content' => $request->content,
            ]);
        }
        if ($check) {
            // Lưu thông báo vào session
            Session::flash('alert', 'Feedback successfull!');

            // return redirect()->route('viewFeedback');
            return back();
        } else {
            // return redirect()->route('viewFeedback');
            return back();
        }
    }


    // public function show($id)
    // {
    //     $feedback = FeedBack::where('maFeedback', $id)->first();
    //     if ($feedback) {
    //         return response()->json([
    //             'status' => 200,
    //             'content' => $feedback
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'no such feedback found'
    //         ], 404);
    //     }
    // }
    function viewUpdate($id)
    {
        $data = feedback::where('id', $id)->get();
        return view('dashboard.feedback.edit_feedback')->with('data', $data);
    }

    public function update(Request $request)
    {
        if ($request) {
            $check =  feedback::where('id', $request->id)->update([
                'email' => $request->email,
                'title' => $request->title,
                'content' => $request->content,
                'content_handle' => $request->contentHandle,
                'date_handle' => $request->dateHandle,
            ]);
        }
        if ($check) {
            // Lưu thông báo vào session
            Session::flash('alert', 'Đây là thông báo alert!');
            $feedback = feedback::paginate(10);


            if ($feedback) {
                $feedback = feedback::all();

                if ($feedback) {
                    return redirect()->route('dashboard.feedback.viewFeedback',  ['data' => $feedback,]);
                    // return view('admin.viewfeedback')->with(
                    //     [
                    //         'data' =>
                    //         $feedback,

                    //     ]
                    // );
                }
            }
        } else {
            $feedback = feedback::all();
            return redirect()->route('dashboard.feedback.viewFeedback',  ['data' => $feedback,]);
        }
    }


    public function destroy($id)
    {
        $feedback = feedback::where('id', $id)->first();
        if ($feedback) {
            $feedback->delete();
            $feedback = feedback::all();
            return redirect()->route('dashboard.feedback.viewFeedback',  ['data' => $feedback,]);
        } else {
            $feedback = feedback::all();
            return redirect()->route('dashboard.feedback.viewFeedback',  ['data' => $feedback,]);
        }
    }
}
