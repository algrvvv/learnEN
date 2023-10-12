@extends('layout.app')
@push('styles')
    @vite(['resources/css/result.css'])
@endpush

@section('title', 'Quiz result')

@section('content')

    {{-- 
    Индексы данных:
    0 - true / false
    1 - начальное слово
    2 - слово, которое ввел пользователь
    3 - правльный перевод
    4 - заметка
    5 - пример
--}}

    <div class="res-inputs">
        @foreach ($words as $word)
            <div class="inputbox {{ $word[0] }}">
                <input disabled required="required" type="text" value="{{ $word[2] }}">
                <span>The word '{{ $word[1] }}'</span>
                <i></i>
            </div>
            <small class="text {{ $word[0] }}">Правильное значение(я) слова: <span>{{ $word[3] }}</span>. <br>
                @if ($word[4])
                    {{ $word[4] }}
                @elseif($word[5])
                    {{ $word[5] }}
                @endif
            </small>
        @endforeach
    </div>
@endsection
