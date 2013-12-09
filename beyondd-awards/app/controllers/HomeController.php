<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	 /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

	public function getIndex()
	{

		$user = User::find(Session::get('user'));
		$names = Names::all();

    	$this->layout->content = View::make('hello')->with(array('user' => $user, 'names' => $names));
	}

	public function postSaveEmail()
	{

		if (Request::json()){
			if ($savedUser = User::where('email', '=', Input::get('_email'))->first())
			{
				if(Session::has('user') && Session::get('user') == Input::get('_email')){
					return Response::json(Session::get('user'));
				}else{
					Session::put('user', $savedUser->id);
					return Response::json(Session::get('user'));
				}
			}else{
				$user = new User;
				$user->email = Input::get('_email');
				$user->save();
				Session::put('user', $user->id);
				return Response::json(Session::get('user'));
			}
		}else{
			// return Response::error('500');
			return Response::json(false);
		}

	}

	public function postSaveAwardone()
	{

		if (Request::json()){

			if(Session::has('user') && Session::get('user') == Input::get('_id')){
				if(!Awardone::where('user_id', '=', Input::get('_id'))->first()){
					if(!Names::where('name', '=', Input::get('_name'))->first()){
						return Response::json('invalid');
					}
						$answerOne = new Awardone;
						$answerOne->user_id = Input::get('_id');
						$answerOne->vote = Input::get('_name');
						$answerOne->save();
						Session::put('user', Input::get('_id'));
						return Response::json(Session::get('user'));
				}
			}

			return Response::json(false);

		}else{
			// return Response::error('500');
			return Response::json(false);
		}

	}

	public function postSaveAwardtwo()
	{

		if (Request::json()){

			if(Session::has('user') && Session::get('user') == Input::get('_id')){
				if(!Awardtwo::where('user_id', '=', Input::get('_id'))->first()){
					if(!Names::where('name', '=', Input::get('_name'))->first()){
						return Response::json('invalid');
					}
					$answerOne = new Awardtwo;
					$answerOne->user_id = Input::get('_id');
					$answerOne->vote = Input::get('_name');
					$answerOne->save();
					Session::put('user', Input::get('_id'));
					return Response::json(Session::get('user'));
				}
			}

			return Response::json(false);

		}else{
			// return Response::error('500');
			return Response::json(false);
		}

	}

}