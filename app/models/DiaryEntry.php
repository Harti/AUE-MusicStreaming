<?php

class DiaryEntry extends Eloquent {
	
	protected $table = 'diary_entry';
	
	public function getDates()
	{
	    return array('created_at', 'updated_at', 'completed_at', 'day');
	}	
}