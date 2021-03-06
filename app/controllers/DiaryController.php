<?php

class DiaryController extends BaseController {

	public function getIndex()
	{
        $user = Auth::user();
		
		if($user->service == 0)
		{
			return View::make('diary.chooseservice');
		}
		
		return View::make('diary.index', array('user' => $user));
	}
	public function getHelp()
	{
        $user = Auth::user();
				
		return View::make('diary.help', array('user' => $user));
	}

    public function getEntry()
    {
    	$user = Auth::user();
		
    	$unfinishedEntry = $user->hasUnfinishedEntries();
		
		if($unfinishedEntry)
		{
			Session::flash('warning', 'Bitte fülle zunächst den <a href="' . URL::to('/diary/entry/' . $unfinishedEntry->id) . '">vorherigen Tagebuch-Eintrag</a> aus, bevor du einen Neuen anlegst.');
			return Redirect::to('/diary');
		}
		
    	$entriesToday = $user->diaryEntries()->where('created_at', DB::raw('CURRENT_DATE'))->get();
		
		if(count($entriesToday) == 2)
		{
			Session::flash('warning', 'Dies ist dein dritter Eintrag heute. Bitte fälsche keine Daten. Falls du nur Daten nachträgst, sieh diesen Hinweis als gegenstandslos an.');
		}		
		else if(count($entriesToday) == 3)
		{
			Session::flash('warning', 'Dies ist dein vierter Eintrag heute. Bitte fälsche keine Daten. Falls du nur Daten nachträgst, sieh diesen Hinweis als gegenstandslos an.');
		}
		else if(count($entriesToday) == 4)
		{
			Session::flash('warning', 'Dies ist dein fünfter Eintrag heute. Bitte fälsche keine Daten. Falls du nur Daten nachträgst, sieh diesen Hinweis als gegenstandslos an.');
		}
		
    	if($user->rdio())
		{
	        $entry = new RdioEntry();
		}
		else 
		{
			$entry = new SpotifyEntry();	
		}
		
		$entry = $user->diaryEntries()->save($entry);
        $entry->save();
		
        return Redirect::to('/diary/entry/' . $entry->id);
    }
	
	public function editEntry($id)
	{
		$user = Auth::user();
		$entry = $user->getEntry($id);
		
		if($user->rdio())
		{
			return View::make('diary.entry-rdio')->with(
				array(
					'entry' => $entry,
					'user'  => $user
				)
			);
		}
		else 
		{
			return View::make('diary.entry-spotify')->with(
				array(
					'entry' => $entry,
					'user'  => $user
				)
			);
		}				
	}

    public function postEntry($id)
    {
		$user = Auth::user();
		
		if($user->rdio())
		{
	        $entry = RdioEntry::find($id);
			
			$entry->listened_to_trends 				= Input::get('listened_to_trends');
			$entry->listened_to_news 				= Input::get('listened_to_news');
			$entry->listened_to_browse				= Input::get('listened_to_browse');
			$entry->listened_to_recommendations		= Input::get('listened_to_recommendations');
			$entry->listened_to_own_playlist		= Input::get('listened_to_own_playlist');
			$entry->listened_to_favorite_playlist 	= Input::get('listened_to_favorite_playlist');
			$entry->listened_to_searched_songs		= Input::get('listened_to_searched_songs');
			$entry->listened_to_channel				= Input::get('listened_to_channel');
			$entry->listened_to_custom_channel		= Input::get('listened_to_custom_channel');		
		}
		else 
		{
			$entry = SpotifyEntry::find($id);
			
			$entry->listened_to_browse_top_lists	= Input::get('listened_to_browse_top_lists');
			$entry->listened_to_browse_news			= Input::get('listened_to_browse_news');
			$entry->listened_to_browse_moods		= Input::get('listened_to_browse_moods');
			$entry->listened_to_browse_discover		= Input::get('listened_to_browse_discover');
			$entry->listened_to_own_playlist		= Input::get('listened_to_own_playlist');
			$entry->listened_to_other_playlist		= Input::get('listened_to_other_playlist');
			$entry->listened_to_searched_songs		= Input::get('listened_to_searched_songs');
			$entry->listened_to_radio				= Input::get('listened_to_radio');			
		}  
		
		$entry->listening_duration					= Input::get('listening_duration');
		$entry->recommendations_quality				= Input::get('recommendations_quality');
		$entry->recommendations_comparison			= Input::get('recommendations_comparison');
		$entry->most_listened						= (Input::get('most_listened') < 12 ? Input::get('most_listened') : Input::get('most-listened-other-input'));  
		$entry->free_notes							= (Input::get('free_notes') ?: null);
		
		$entry->completed_at = time();
		$entry->day = strtotime(Input::get('day'));
		$entry->save();  
		
		Session::flash('success', 'Tagebuch-Eintrag erfolgreich hinzugefügt.');  
		return Redirect::to('/diary');
    }

    public function postService()
    {
    	$user = Auth::user();
		$user->service = Input::get("service");
		$user->familiarity_with_service = Input::get("familiarity");
		$user->age = Input::get("age");
		$user->gender = Input::get("gender");
		$user->save();

		Session::flash('success', 'Dienst ' . $user->serviceName() . ' erfolgreich ausgewählt.');
		return Redirect::to('/diary');
    }
	
}
