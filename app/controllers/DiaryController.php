<?php

class DiaryController extends BaseController {

	public function getIndex()
	{
        $user = Auth::user();
        $diarypages = DiaryEntry::where('id', '==', $user->id)->get();
		return View::make('diary.index', array('diarypages' => $diarypages));
	}

    public function getDiaryPage()
    {
        $entry = new DiaryEntry();
        $entry->save();
        return View::make('diary.page');
    }

    public function postDiaryPage()
    {
        
    }
	
}
