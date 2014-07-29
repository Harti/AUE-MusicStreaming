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
		
		$attempt->preferred_service = Input::get("preferred_service");
		$attempt->preferred_known = Input::get("preferred_known");
		$attempt->preferred_look = Input::get("preferred_look");
		$attempt->preferred_features = Input::get("preferred_features");
		$attempt->preferred_other = Input::get("preferred_other");
		$attempt->disliked_service = Input::get("disliked_service");
		$attempt->disliked_known = Input::get("disliked_known");
		$attempt->disliked_look = Input::get("disliked_look");
		$attempt->disliked_features = Input::get("disliked_features");
		$attempt->disliked_other = Input::get("disliked_other");
		
		$attempt->save();
		
		return View::make('screener.success')->with('attempt', $attempt);
	}
}
