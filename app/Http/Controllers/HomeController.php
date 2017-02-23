<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->status == 0) {
            $q = Question::with('answers')->has('answers')->take(10)->get();
            $questions = [];
            foreach ($q as $item) {

                $questions[$item->id]['id'] = $item->id;
                $questions[$item->id]['title'] = $item->text;

                foreach ($item->answers as $k => $answer) {
                    $questions[$item->id]['answers'][$answer['id']] = $answer['text'];
                }
            }
            $data = ['questions' => $questions];
        } else {

            $data = [
                'answers' => Answer::all(),
                'question' => Question::all()->toArray()
            ];
        }
            return view('home', $data);

    }

    public function addAnsw(Request $request){
			$request_array = $request->except('_token');

				Auth::user()->answers()->sync(array_values($request_array));

				return redirect()->route('home');
    }
}
