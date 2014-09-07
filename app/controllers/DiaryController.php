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

    public function getEntry()
    {
    	$user = Auth::user();
		
    	$unfinishedEntry = $user->hasUnfinishedEntries();
		
		if($unfinishedEntry)
		{
			Session::flash('warning', 'Bitte fülle zunächst den <a href="' . URL::to('/diary/entry/' . $unfinishedEntry->id) . '">vorherigen Tagebuch-Eintrag</a> aus, bevor du einen Neuen anlegst.');
			return Redirect::to('/diary');
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
		
		if($user->rdio())
		{
	        $entry = RdioEntry::find($id);
			return View::make('diary.entry-rdio')->with('entry', $entry);
		}
		else 
		{
			$entry = SpotifyEntry::find($id);
			return View::make('diary.entry-spotify')->with('entry', $entry);
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
			$entry->listened_to_people				= Input::get('listened_to_people');
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
			$entry->listened_to_follow				= Input::get('listened_to_follow');
			$entry->listened_to_own_playlist		= Input::get('listened_to_own_playlist');
			$entry->listened_to_other_playlist		= Input::get('listened_to_other_playlist');
			$entry->listened_to_searched_songs		= Input::get('listened_to_searched_songs');
			$entry->listened_to_radio				= Input::get('listened_to_radio');			
		}  
		
		$entry->listening_duration					= Input::get('listening_duration');
		$entry->recommendations_quality				= Input::get('recommendations_quality');
		$entry->recommendations_comparison			= Input::get('recommendations_comparison');
		$entry->most_listened						= Input::get('most_listened');  
		
		$entry->completed_at = time();
		$entry->day = strtotime(Input::get('day'));
		$entry->save();    
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
