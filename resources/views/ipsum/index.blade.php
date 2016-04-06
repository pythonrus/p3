@extends('layouts.master')


@section('title')
    Generate lorem ipsum
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}
@section('head')

@stop


@section('content')
        <h1>Lorem Ipsum Generator</h1>

        <form method='POST' action='/ipsum'>

            <input type='hidden' name='_token' value='{{ csrf_token() }}'>

            Paragraphs: <input type='text' name='num_paragraphs' value={{old('num_paragraphs')}}><br>

        @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

            <input type='submit' value='Generate!'>

        </form>

@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')

@stop
