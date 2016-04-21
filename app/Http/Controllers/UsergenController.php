<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

use Faker\Factory as Faker;

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

        $data = $request ->all();

        // Create users
        $faker = \Faker\Factory::create();

        $users = array();
            $numusers = $request -> input('number_of_users');
            $birthdate = $request -> input('birthdate');
            $email = $request -> input('email');
            $profile = $request -> input('profile');
          		for ($i=0; $i < $numusers; $i++) {
                   		$name = $faker->name;
                   		$users[$i]['name'] = $name;
                            if (isset($birthdate)) {
                                    $birthdate = $faker->date;;
                                    $users[$i]['birthdate'] = $birthdate;
                            }
                   			if (isset($email)) {
                      				$email = $faker->email;
                      				$users[$i]['email'] = $email;
                   			}
                            if (isset($profile)) {
                                    $profile = $faker->sentence($nbWords = 100);
                                    $users[$i]['profile'] = $profile;
                                }
                		}
        return view('usergen.postIndex')->with(['users' => $users]);
    }
}
