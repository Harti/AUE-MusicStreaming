<?php

class SpotifyEntry extends Eloquent {
	
	protected $table = 'diary_entry_spotify';
	
	public function getDates()
	{
	    return array('created_at', 'updated_at', 'completed_at', 'day');
	}	
	
	public function finished()
	{
		return !is_null($this->completed_at);
	}
}