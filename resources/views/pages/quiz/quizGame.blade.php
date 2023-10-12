@extends('layout.app')
@push('styles')
    @vite(['resources/css/quizGame.css'])
@endpush

@section('title', 'Lets gooo!')

@section('content')
    @if ($error)
        {{ $error }}
    @else
        <div class="game">
            <form action="{{route('quiz.res')}}" method="get">
                @foreach ($words as $word)
                    <div class="inputs">
                        <div class="inputbox">
                            <input disabled required="required" type="text" value="{{ $word->eng }}">
                            <span>English word</span>
                            <i></i>
                        </div>

                        <div class="inputbox">
                            <input required="required" type="text" name="{{$word->id}}" autocomplete="off">
                            <span>Russian word</span>
                            <i></i>
                        </div>

                    </div>
                @endforeach
                <div class="div-for-btn">
                    <button type="submit" class="button-classic" style="width: 50%">Check</button>
                </div>
            </form>
        </div>

    @endif
@endsection
