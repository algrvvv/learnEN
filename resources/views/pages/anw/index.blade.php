@extends('layout.app')
@push('styles')
    @vite(['resources/css/anw.index.css'])
@endpush

@section('title', 'Add new words')

@section('content')
    <main>
        <form action="{{ route('add.store') }}" method="post">
            @csrf
            <div class="inp-div">
                <div class="inputbox">
                    <input type="text" required="required" autocomplete="off" name="eng" id="eng">
                    <span>English word</span>
                    <i></i>
                </div>
                @error('eng')
                    <small style="color: #ff9090;">{{ $message }}</small>
                @enderror
            </div>

            <div class="inp-div">
                <div class="inputbox">
                    <input type="text" required="required" autocomplete="off" name="rus" id="rus">
                    <span>Russian word</span>
                    <i></i>
                </div>
                @error('rus')
                    <small style="color: #ff9090;">{{ $message }}</small>
                @enderror
            </div>

            <br>
            <small style="opacity: .2">last added word: {{$last->eng}}</small>
            <br>
            <button type="submit" class="button-classic">Add a new word</button>
        </form>
    </main>
@endsection
