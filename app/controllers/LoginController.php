<?php

class LoginController extends BaseController {

	public function getIndex()
	{
		if(!Auth::guest())
		{
			return Redirect::to('/diary');
		}
		
		return View::make('login.index');
	}
	
	public function postIndex()
	{
		$user = User::where('email', md5(Input::get('email')))->first();
		
		if(!$user)
		{
			Session::flash('error', 'Diese E-Mail-Adresse ist nicht in unserem System verzeichnet.');
			return Redirect::to('/login');
		}

		$password = Hash::check(Input::get('password'), $user->password);
		if(!$password)
		{
			Session::flash('error', 'Das Passwort ist falsch.');
			return Redirect::to('/login');
		}
		
		Auth::login($user);
		
		Session::flash('success', 'Login erfolgreich!');
		return Redirect::to('/diary');
	}
	
	public function getRegister()
	{
		return View::make('login.register');	
	}
	
	public function postRegister()
	{
		$validator = Validator::make(
			array(
				'email' 				=> Hash::make(Input::get('email')),
				'password' 				=> Input::get('password')
			),
			array(
				'email' 				=> 'required|unique:users',
				'password' 				=> 'required|min:6'
			)
		);
		
		if($validator->fails())
		{
			Session::flash('error', 'Registrierung fehlgeschlagen. Prüfe bitte deine Eingaben.');
			return Redirect::to('/register')->withInput()->withErrors($validator);
		}
		
		$user = new User();
		$user->email = md5(Input::get('email'));
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		
		return Redirect::to('/login');			
	}
	
	public function getLogout()
	{
		Auth::logout();
		Session::flash('success', 'Logout erfolgreich.');
		return Redirect::to('/login');
	}
}
