<?php

class SlopeTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('slopes')->delete();
		$this->runService(1);
		$this->runService(2);
    }
	
	private function runService($serviceID)
	{		
    	if($serviceID == 1)
		{
			$table = 'diary_entry_spotify';
		}
		else
		{
			$table = 'diary_entry_rdio';	
		}
		
    	$genreList = DB::table($table)->distinct('most_listened')->lists('most_listened');		
		$userList = DB::table('users')->where('service', $serviceID)->lists('id');
				
		foreach($userList as $userID)
		{
			// print "<hr />USER " . $userID . "<br />";	
			// print("<b>uID\tgID\tm</b><br />");	
			foreach($genreList as $genreID)
			{
				$slope = $this->getSlope($userID, $genreID, $table);
				//if($slope != 0) print($userID . "\t" . $genreID . "\t" . $slope . "<br />");
		        if($slope !== false) 
		        {
		        	Slope::create(array('user_id' => $userID, 'service_id' => $serviceID, 'genre' => $genreID, 'slope' => $slope));
				}
			}
		}
	}
	
	private function getSlope($userID, $genreID, $table)
	{
		$userListenedToGenreInstances = DB::table($table)->where('user_id', $userID)->where('most_listened', $genreID)->orderBy('day', 'asc');		
		$amountOfDaysUserListenedToGenre = $userListenedToGenreInstances->count();
		
		if($amountOfDaysUserListenedToGenre <= 1) 
		{
			return false;
		}
		
		$firstDay = $userListenedToGenreInstances->first();
		$lastDay = DB::table($table)->where('user_id', $userID)->where('most_listened', $genreID)->orderBy('day', 'desc')->first();
		
		$firstRQ = $firstDay->recommendations_quality;
		$lastRQ = $lastDay->recommendations_quality;
		
		// firstRQ is the starting point of the line, lastRQ the point the line has to pass linearly.
		//
		// 			g(x) = firstRQ + m*x 
		//
		// where 	x := day
		// and		m := (y1-y0) / (x1-x0)
		//		
		// with 	y1 = lastRQ (rating on last day), 
		//			y0 = firstRQ (rating on first day), 
		//			x1 = amountOfDaysUserListenedToGenre, 
		//			x0 = 1 (first day user listened to genre).
		//
		// since we only need the slope m, we're only calculating that.
		
		$slope = ($lastRQ-$firstRQ) / ($amountOfDaysUserListenedToGenre-1);
		
		return $slope;
	}

}