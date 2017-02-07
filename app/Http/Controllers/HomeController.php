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
            $q = Question::all();
            $questions = [];

            foreach ($q as $item) {
                $a = Answer::where('qId', $item->id)->get()->toArray();

                $questions[$item->id]['id'] = $item->id;
                $questions[$item->id]['title'] = $item->text;

                foreach ($a as $k => $answer) {
                    $questions[$item->id]['a' . $k] = $answer['text'];
                    $questions[$item->id]['a' . $k . 'id'] = $answer['id'];
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
        $a1 = Answer::where('id', $request->cg1)->get()->toArray()[0]['count'];
        $a2 = Answer::where('id', $request->cg2)->get()->toArray()[0]['count'];
        $a3 = Answer::where('id', $request->cg3)->get()->toArray()[0]['count'];

        Answer::where('id', $request->cg2)->update([
            'count' => $a2 + 1
        ]);

        Answer::where('id', $request->cg1)->update([
            'count' => $a1 + 1
        ]);

        Answer::where('id', $request->cg3)->update([
            'count' => $a3 + 1
        ]);

        User::where('id', Auth::user()->id)->update([
            'status'=>1
        ]);

        return redirect()->route('home');
    }
}
