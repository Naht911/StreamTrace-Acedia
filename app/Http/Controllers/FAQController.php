<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\faq;
use Illuminate\Console\View\Components\Alert;

class FAQController extends Controller
{
    function control_FAQ()
    {
        $faq = faq::paginate(5);

        if ($faq) {
            return view(
                'dashboard.FAQ.frequently_asked_questions',
                ['data' => $faq]
            );
        }
    }
    function FAQ()
    {
        $faq = faq::all();
        if ($faq) {
            return view('home.frequently_asked_questions')->with(
                [
                    'data' =>
                    $faq,
                ]
            );
        }
    }
    function create()
    {
        return view('dashboard.FAQ.add_frequently_asked_questions');
    }

    function create_FAQ(Request $request)
    {

        // them 
        if ($request->all()) {
            $data =  faq::create([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
        }
        if ($data) {
            return redirect()->route('dashboard.FAQ');
        }
    }


    function edit_FAQ($id)
    {

        $faq = faq::find($id)->first();
        return view('dashboard.FAQ.edit_frequently_asked_questions',  ['data' => $faq]);
    }
    function update_FAQ(Request $request, $id)
    {
        // them 
        if ($request) {
            $check =  faq::where('id', $id)->update([
                'question' => $request->question,
                'answer' => $request->answer,
            ]);
            if ($check) {
                $data = faq::all();
            }
            return redirect()->route('dashboard.FAQ',  ['data' => $data,]);
        }
    }
    function delete_FAQ($id)
    {
        $faq = faq::where('id', $id)->delete();
        if ($faq) {
            return redirect()->route('dashboard.FAQ');
        }
    }
}
