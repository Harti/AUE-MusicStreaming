<?php

class RdioEntry extends Eloquent {
	
	protected $table = 'diary_entry_rdio';
	
	public function getDates()
	{
	    return array('completed_at', 'day');
	}	
	
	public function finished()
	{
		return !is_null($this->completed_at);
	}
}