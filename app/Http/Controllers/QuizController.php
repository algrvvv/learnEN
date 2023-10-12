<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('pages.quiz.quiz');
    }

    public function show(Request $request)
    {
        $langs = ['ru', 'rus', 'en', 'eng'];
        $request->validate([
            'lang' => ['required'],
            'count'  => ['required']
        ]);

        $lang = request('lang');
        $count = request('count');
        $words_array = Word::inRandomOrder()->limit($count)->get();

        if (in_array(strtolower($lang), $langs)) {
            return view('pages.quiz.quizGame', [
                'i' => 1,
                'error' => '',
                'lang' => $lang,
                'words' => $words_array
            ]);
        }

        return view('pages.quiz.quizGame', [
            'error' => "Error, the wrong language is selected '$lang'"
        ]);
    }

    public function check(Request $request)
    {
        $answer = [];
        $req = $request->all();

        foreach ($req as $key => $val) {
            $corr = explode(',', Word::where('id', $key)->value('rus'));
            $note = Word::where('id', $key)->value('note');
            $example = Word::where('id', $key)->value('example');
            $corr_eng = implode(', ',explode(',', Word::where('id', $key)->value('eng')));
            $corr_str = implode(', ', $corr);

            if (in_array($val, $corr)) {
                $answer[$key] = ['true', $corr_eng, request($key), $corr_str, $note, $example];
            } else {
                $answer[$key] = ['false', $corr_eng, request($key), $corr_str, $note, $example];
            }
        }

        // if($answer[3] === true){
        // return response()->json([
        //     // 'ans' => $req
        //     'a' => $answer[1][0]
        // ]);
        // }

        return view('pages.quiz.result', [
            'words' => $answer
        ]);
    }
}
