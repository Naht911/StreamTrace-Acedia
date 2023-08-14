<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class FeedbackController extends Controller
{
    function feedback()
    {

        return view('home/feedback');
    }
    public function list_feedback(Request $request)
    {

        if ($request->status) {
            $feedback = feedback::where('status', $request->status);
        } else {
            $feedback =  new feedback;
        }
        $data = $feedback->paginate(6);
        // $data3 = feedback::all()->where('status', 1);
        if ($data) {
            return view('dashboard.feedback.list_feedback', ['status' => $request->status])->with(
                [
                    // 'data1' =>
                    // $data1,
                    'data2' =>
                    $data,
                    // 'data3' =>
                    // $data3,

                ]
            );
        } else {
            return abort(404);
        }
    }


    public function create_feedback(Request $request)
    {

        if ($request->all()) {
            if ($request->email == null) {
                $check =  feedback::create([
                    'title' => $request->title,
                    'email' => Auth::user()->email,
                    'content' => $request->content,
                    'status' => 'received',
                ]);
            } else {
                $check =  feedback::create([
                    'title' => $request->title,
                    'email' => $request->email,
                    'content' => $request->content,
                    'status' => 'received',
                ]);
            }
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
    function edit_feedback($id)
    {
        $data = feedback::find($id)->first();

        return view('dashboard.feedback.edit_feedback', [
            'data' => $data,

        ]);
    }

    public function update_feedback(Request $request, $id)
    {
        if ($request) {
            $check =  feedback::where('id', $id)->update([
                'email' => $request->email,
                'title' => $request->title,
                'content' => $request->content,
                'status' => 'pending',
                'content_handle' => $request->content_handle,

            ]);
        }
        if ($check) {
            // Lưu thông báo vào session
            Session::flash('alert', 'Đây là thông báo alert!');
            $feedback = feedback::paginate(10);


            if ($feedback) {
                $feedback = feedback::all();

                if ($feedback) {
                    return redirect()->route('dashboard.feedback',  ['data' => $feedback,]);
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
            return redirect()->route('dashboard.feedback.feedback',  ['data' => $feedback,]);
        }
    }
    public function complete_processing(Request $request)
    {

        $check =  feedback::where('id', $request->id)->update([
            'status' => 'completed',
        ]);


        if ($check) {
            $data = feedback::find($check)->first();


            Mail::send('emails.completed_feedback', ['data' => $data], function ($email) use ($data) {
                $email->subject('acedia - password retrieval');
                $email->to($data->email);
            });

            $feedback = feedback::paginate(10);
            if ($feedback) {
                $feedback = feedback::all();

                if ($feedback) {
                    return redirect()->route('dashboard.feedback',  ['data' => $feedback,]);
                }
            }
        } else {
            $feedback = feedback::all();
            return redirect()->route('dashboard.feedback.feedback',  ['data' => $feedback,]);
        }
    }


    public function delete_feedback($id)
    {
        $feedback = feedback::where('id', $id)->first();
        if ($feedback) {
            $feedback->delete();
            $feedback = feedback::all();
            return redirect()->route('dashboard.feedback.feedback',  ['data' => $feedback,]);
        } else {
            $feedback = feedback::all();
            return redirect()->route('dashboard.feedback.feedback',  ['data' => $feedback,]);
        }
    }
}
