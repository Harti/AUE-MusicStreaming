<?php

class EntryTableSeeder extends Seeder {

    public function run()
    {
    	DB::raw("UPDATE diary_entry_rdio SET recommender_percentage = (listened_to_trends + listened_to_browse + listened_to_recommendations + listened_to_channel + listened_to_custom_channel)");
    	DB::raw("UPDATE diary_entry_spotify SET recommender_percentage = (listened_to_browse_top_lists + listened_to_browse_news + listened_to_browse_moods + listened_to_browse_discover + listened_to_radio)");
    }
	

}