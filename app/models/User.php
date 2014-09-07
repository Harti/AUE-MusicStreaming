<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $timestamps = false;

	protected $table = 'users';


    public function diaryEntries()
    {
        return $this->hasMany('DiaryEntry');
    }

	public function serviceName()
	{
		return $this->service == 2 ? "rdio" : "Spotify";
	}
}
