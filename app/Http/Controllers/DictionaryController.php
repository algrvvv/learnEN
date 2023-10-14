<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index(){
        return view('pages.dict.index', [
            'dict' => Word::all()
        ]);
    }
}
