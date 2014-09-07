<?php

class DiaryController extends BaseController {

	public function getIndex()
	{
        $user = Auth::user();
		
		if($user->service == 0)
		{
			return View::make('diary.chooseservice');
		}
		
		
        $diaryPages = $user->diaryEntries;
		return View::make('diary.index', array('diaryPages' => $diaryPages));
	}

    public function getEntry()
    {
        $entry = new DiaryEntry();
        $entry->save();
        return Redirect::to('/diary/entry/' . $entry->id);
    }
	
	public function editEntry($id)
	{
		$entry = DiaryEntry::find($id);
		return View::make('diary.entry')->with('entry', $entry);
	}

    public function postEntry()
    {
        
    }

    public function postService()
    {
    	$user = Auth::user();
		$user->service = Input::get("service");
		$user->familiarity_with_service = Input::get("familiarity");
		$user->save();
		
		Session::flash('success', 'Dienst ' . $user->serviceName() . ' erfolgreich ausgewählt.');
		return Redirect::to('/diary');
    }
	
}
