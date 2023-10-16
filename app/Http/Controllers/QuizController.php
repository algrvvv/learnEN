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
        // Индексы данных:
        // 0 - true / false
        // 1 - начальное слово
        // 2 - слово, которое ввел пользователь
        // 3 - правльный перевод
        // 4 - заметка
        // 5 - пример

        $answer = [];
        $req = $request->all();
        $correct_answer_count = 0;
        $all_words_count = 0;

        foreach ($req as $key => $val) {
            $corr = explode(',', str_replace(', ', ',', Word::where('id', $key)->value('rus'))); // [приветпока] ->  [привет,пока]
            // $corr = [str_replace(',', ' ', Word::where('id', $key)->value('rus'))];
            $note = Word::where('id', $key)->value('note');
            $example = Word::where('id', $key)->value('example');
            $corr_eng = implode(', ',explode(',', Word::where('id', $key)->value('eng')));
            $corr_str = implode(', ', $corr);

            // implode() - объединение массива в строку
            // explode() - разбивает строку и добавляет в массив
            
            if (in_array($val, $corr)) {
                $answer[$key] = ['true', $corr_eng, request($key), $corr_str, $note, $example];
                $correct_answer_count += 1;
                $all_words_count += 1;
            } else {
                $all_words_count += 1;
                $answer[$key] = ['false', $corr_eng, request($key), $corr_str, $note, $example];
            }
        }

        // return response()->json([
        //     'words' => $answer
        // ]);

        return view('pages.quiz.result', [
            'words' => $answer,
            'correct' => $correct_answer_count,
            'all' => $all_words_count,
            'class' => ($all_words_count * 0.5 <= $correct_answer_count) ? 'correct' : 'wrong'
        ]);
    }
}
