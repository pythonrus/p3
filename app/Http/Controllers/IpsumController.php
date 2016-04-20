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

        $data = $request ->all();

        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($data['num_paragraphs']);
        echo implode('<p>', $paragraphs);
        //return view('lorem.postIndex')->with(['paragraphs' => $paragraphs]);


        //dd($request ->all());
        //return 'Process lorem ipsum';
    }
}
