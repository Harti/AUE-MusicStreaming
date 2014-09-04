<?php

class ScreenerController extends BaseController {

	public function getIndex()
	{
		$attempt = new ScreenerAttempt();	
		$attempt->save();	
		return View::make('screener.index')->with('attempt', $attempt);
	}
	
	public function postIndex()
	{
		$attempt = ScreenerAttempt::find(Input::get("attempt"));
		
		$attempt->preferred_service = Input::get("preferred-service");
		$attempt->preferred_known = Input::get("preferred-known");
		$attempt->preferred_look = Input::get("preferred-look");
		$attempt->preferred_features = Input::get("preferred-features");
		$attempt->preferred_other = (Input::get("preferred-other") ? Input::get("preferred-other-input") : "");
		$attempt->save();
		$attempt->completed_at = $attempt->updated_at;
		$attempt->save();
		
		return View::make('screener.success')->with('attempt', $attempt);
	}
	
	public function postGiveaway()
	{
		if(Input::get("attempt") == 0) 
		{
			return View::make('screener.complete');
		}
		
		$attempt = ScreenerAttempt::find(Input::get("attempt"));
		$volunteer = new Volunteer();
		$volunteer->screener_attempt_id = $attempt->id;
		
		$validator = Validator::make(Input::all(), array(
			'email' => 'email|required'
		));
		
		if($validator->fails())
		{
			Session::flash('error', 'Bei der Übermittlung deiner Daten ist ein Fehler aufgetreten. Bitte prüfe das Formular und versuche es erneut.');
			return View::make('screener.success')->withErrors($validator)->with('attempt', $attempt);
		}
		$volunteer->email = Input::get('email');
		$volunteer->save();
		
		Session::forget('error');
		return View::make('screener.complete');
	}
	
	public function getSuccess()
	{
		return View::make('screener.success')->with('attempt', ScreenerAttempt::find(0));
	}
}
