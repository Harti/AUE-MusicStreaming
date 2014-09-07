<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $timestamps = false;

	protected $table = 'users';

	public function spotify()
	{
		return $this->service == 1;
	}
	
	public function rdio()
	{
		return $this->service == 2;
	}

    public function diaryEntries()
    {
    	if($this->rdio())
		{
	        return $this->hasMany('RdioEntry')->orderBy('created_at');
		}
		else
		{
	        return $this->hasMany('SpotifyEntry')->orderBy('created_at');
		}
    }
	
	public function hasUnfinishedEntries()
	{
		foreach($this->diaryEntries as $entry)
		{
			if(!$entry->finished()) return $entry;
		}
		return false;
	}

	public function serviceName()
	{
		return $this->rdio() ? "rdio" : "Spotify";
	}
}
