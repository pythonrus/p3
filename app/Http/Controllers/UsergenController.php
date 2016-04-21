<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class UsergenController extends Controller
{
    public function getIndex()
    {

        return view('usergen.index');
    }

    public function postIndex(Request $request)
    {

        $this->validate($request, [
            'number_of_users' => 'required|integer|min:1|max:99',
        ]);

        return 'Process usergen';

    }
}
