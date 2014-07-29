<?php

class Volunteer extends Eloquent {
	
	protected $table = 'volunteers';
	public $timestamps = false;
	
	public function screenerAttempt()
	{
		return $this->hasOne('ScreenerAttempt');
	}
}