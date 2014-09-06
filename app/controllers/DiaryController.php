<?php

class DiaryController extends BaseController {

	public function getIndex()
	{
		return View::make('diary.index');
	}
	
}
