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
		$attempt->disliked_service = Input::get("disliked-service");
		$attempt->disliked_known = Input::get("disliked-known");
		$attempt->disliked_look = Input::get("disliked-look");
		$attempt->disliked_features = Input::get("disliked-features");
		$attempt->disliked_other = (Input::get("disliked-other") ? Input::get("disliked-other-input") : "");
		$attempt->save();
		$attempt->completed_at = $attempt->updated_at;
		$attempt->save();
		
		return View::make('screener.success')->with('attempt', $attempt);
	}
	
	public function postVolunteer()
	{
		$attempt = ScreenerAttempt::find(Input::get("attempt"));
		$volunteer = new Volunteer();
		$volunteer->screener_attempt_id = $attempt->id;
		
		$validator = Validator::make(Input::all(), array(
			'email' => 'email|required_without_all:skype,facebook',
			'skype' => 'required_without_all:email,facebook',
			'facebook' => 'required_without_all:email,skype'
		));
		
		if($validator->fails())
		{
			Session::flash('error', 'Bei der Übermittlung deiner Daten ist ein Fehler aufgetreten. Bitte prüfe das Formular und versuche es erneut.');
			return View::make('screener.success')->withErrors($validator)->with('attempt', $attempt);
		}
		$volunteer->email = Input::get('email');
		$volunteer->skype = Input::get('skype');
		$volunteer->facebook = Input::get('facebook');
		$volunteer->save();
		
		Session::forget('error');
		return View::make('screener.complete');
	}
	
	public function getSuccess()
	{
		return View::make('screener.success')->with('attempt', ScreenerAttempt::find(1));
	}
}
