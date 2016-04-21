<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class IpsumController extends Controller
{
    public function getIndex()
    {
        //return 'Show lorem ipsum';
        return view('ipsum.index');
    }

    public function postIndex(Request $request)
    {

        $this->validate($request, [
            'number_of_paragraphs' => 'required|integer|min:1|max:99',
        ]);

        $data = $request ->all();

        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($data['number_of_paragraphs']);

        return view('ipsum.postIndex')->with(['paragraphs' => $paragraphs]);
        // echo implode('<p>', $paragraphs);

        //dd($request ->all());
        //return 'Process lorem ipsum';
    }
}
