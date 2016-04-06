<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class IpsumController extends Controller
{
    //



    public function getIndex()
    {
        //return 'Show lorem ipsum';
        return view('ipsum.index');
    }

    public function postIndex(Request $request)
    {

        $this->validate($request, [
            'num_paragraphs' => 'required|numeric',
        ]);

        //dd($request ->all());
        return 'Process lorem ipsum';
    }
}
