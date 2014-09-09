<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryEntrySpotify extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diary_entry_spotify', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->timestamp('day')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->timestamp('completed_at')->nullable();
						
			$table->integer('listening_duration')->default(0);
			
			$table->integer('listened_to_browse_top_lists')->default(0);
			$table->integer('listened_to_browse_news')->default(0);
			$table->integer('listened_to_browse_moods')->default(0);
			$table->integer('listened_to_browse_discover')->default(0);
			$table->integer('listened_to_own_playlist')->default(0);
			$table->integer('listened_to_other_playlist')->default(0);
			$table->integer('listened_to_searched_songs')->default(0);
			$table->integer('listened_to_radio')->default(0);
			
			$table->integer('recommendations_quality')->default(0);
			$table->integer('recommendations_comparison')->default(0);
			$table->string('most_listened');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('diary_entry_spotify');
	}

}
