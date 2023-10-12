@extends('layout.app')
@push('styles')
    @vite(['resources/css/quiz.css'])
    @vite(['resources/css/quizGame.css'])
@endpush

@section('title', 'Quiz EN-RU')

@section('content')
    <div class="wrap-text">
        <h1 class="text-title">Rules of the game</h1>
        <p class="text">In the left line, the word is displayed, the translation of which you need to write in the right
            line</p>

        <form action="{{route('quiz.word')}}" method="get" class="game-form">

            <p class="text" style="margin: 0 auto;">Choose which language you will translate into</p>
            <br>
            <div class="radio-input">
                <label>
                    <input value="rus" name="lang" id="value-1" type="radio" checked="">
                    <span>Rus</span>
                </label>
                <label>
                    <input value="en" name="lang" id="value-2" type="radio">
                    <span>Eng</span>
                </label>
                <span class="selection"></span>
            </div>

            <br>

            <p class="text" style="margin: 0 auto;">Write the number of words you want to translate</p>

            <br>

            <div class="inputbox">
                <input required="required" type="text" value="" name="count" id="count" autocomplete="off">
                <span>Number word</span>
                <i></i>
            </div>

            <br>

            <button type="submit" class="button-classic">Let's get started</button>
        </form>


    </div>
@endsection
