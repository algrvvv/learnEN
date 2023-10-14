<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class AnwController extends Controller
{
    public function index(){
        return view('pages.anw.index' , [
            'last' => Word::orderBy('id', 'desc')->first()
        ]);
    }

    public function store(Request $request){
        $word = $request->validate([
            'eng' => ['required', 'unique:words,eng'],
            'rus' => ['required', 'unique:words,rus'],
        ]);

        Word::create($word);

        return back()->with('success', 'Success!');
    }
}
