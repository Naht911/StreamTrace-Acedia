<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faq;
use Illuminate\Console\View\Components\Alert;

class FAQController extends Controller
{
    function create_new(Request $request)
    {

        // them 
        if ($request) {
            $check =  faq::create([
                'question' => $request->question,
                'answer' => $request->reply,
            ]);
        }
        if ($check) {
            return  back();
        }
    }
    function showAllUser()
    {
        $faq = faq::all();

        if ($faq) {
            return view('dashboard.FAQ.frequently_asked_questions')->with(
                [
                    'data' =>
                    $faq,
                ]
            );
        }
    }
    function showAllAdmin()
    {
        $faq = faq::all();

        if ($faq) {
            return view('dashboard.FAQ.frequently_asked_questions')->with(
                [
                    'data' =>
                    $faq,
                ]
            );
        }
    }
    function viewUpdate($id)
    {

        $faq = faq::all()->where('id', $id);
        return view('dashboard.FAQ.edit_frequently_asked_questions',  ['data' => $faq,]);
        // return view('admin.frequently_asked_questions.frequently_asked_questions')->with(
        //     [
        //         'data' =>
        //         $faq,
        //     ]
        // );

    }
    function update(Request $request)
    {
        // them 
        if ($request) {
            $check =  faq::where('id', $request->id)->update([
                'question' => $request->question,
                'answer' => $request->reply,
            ]);
            return redirect()->route('dashboard.FAQ.viewAdminFAQ',  ['data' => $check,]);
        }
    }
    function destroy($id)
    {
        $faq = faq::where('id', $id)->delete();
        if ($faq) {
            $faq = faq::all();
            return redirect()->route('dashboard.FAQ.viewAdminFAQ',  ['data' => $faq,]);
            // return view('admin.frequently_asked_questions.frequently_asked_questions')->with(
            //     [
            //         'data' =>
            //         $faq,
            //     ]
            // );
        }
    }
}
