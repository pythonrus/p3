@extends('layouts.master')


@section('title')
    Generate random user
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')

        <h1>Random User Generator</h1>

        <form method='POST' action='/usergen'>

            <input type='hidden' name='_token' value='{{ csrf_token() }}'>

            Enter Number of Users (1-99):  <input type='text' name='number_of_users' value={{old('number_of_users')}}><br>

            <input id="birthdate" type="checkbox" name="birthdate"
                    <?php
                    if (isset($_POST["birthdate"]))
                            echo "true";
                    ?>>
            <label for="birthdate">Check if you birthdate for each user</label><br>

            <input id="email" type="checkbox" name="email"
                <?php
                  if (isset($_POST["email"]))
                      echo "true";
                ?>>
            <label for="email">Check if you want email for each user</label><br>


            <input id="profile" type="checkbox" name="profile"
                    <?php
                    if (isset($_POST["profile"]))
                            echo "true";
                    ?>>
            <label for="profile">Check if you want a lorem ipsum style profile description</label><br>


        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

            <br><input type='submit' value='Generate!'>

        </form><br>

        <section>
          <div class="output">
            <h2>Your Users</h2>
              <hr/>
              @foreach ($users as $user)
                <h4>Name: {{ $user['name'] }}</h4>
              @if( isset($user['birthdate']) )
                <p>Birthdate: {{ $user['birthdate'] }}</p>
              @endif
              @if( isset($user['email']) )
                <p>Email: {{ $user['email'] }}</p>
              @endif
              @if( isset($user['profile']) )
                <p>Profile: {{ $user['profile'] }}</p>
              @endif
              @endforeach
          </div>
        </section>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
