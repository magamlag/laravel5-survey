<?php

namespace App\Http\Controllers;

use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Auth;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( Auth::user()->status == 0 ) {
			$data = $this->prepareQuestionsAndAnswersForResult();

			return view( 'home', $data );

		} else {

			$data = [
					'answers'  => Answer::all(),
					'question' => Question::all()->toArray()
			];
		}
		return view( 'home', $data );

	}

	/**
	 * Save answers
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function addAnsw( Request $request ) {
		$request_array = $request->except( '_token' );
		$user_id       = Auth::user()->id;
		$created_at    = Carbon::now();
		foreach ( $request_array['item'] as $key => &$value ) {
			$value['user_id']    = $user_id;
			$value['created_at'] = $created_at;
		}
		Participant::insert( $request_array['item'] );
		return redirect()->route( 'result' );
	}

	/**
	 * Show diagram of all answers
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showResult() {
		$data = [
				'answers'  => Answer::all(),
				'question' => Question::all()->toArray()
		];

		return view( 'result', compact( [ $data ] ) );
	}

	/**
	 * Get questions and related answers for result page
	 *
	 * @return array
	 */
	public function prepareQuestionsAndAnswersForResult() {
		$q         = Question::with( 'answers' )->has( 'answers' )->take( 2 )->get();
		$questions = [];
		foreach ( $q as $item ) {

			$questions[$item->id]['id']    = $item->id;
			$questions[$item->id]['title'] = $item->text;

			foreach ( $item->answers as $k => $answer ) {
				$questions[$item->id]['answers'][$answer['id']] = $answer['text'];
			}
		}

		$data = [ 'questions' => $questions ];
		return $data;
	}
}
