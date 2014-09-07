<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryEntryRdio extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diary_entry_rdio', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->timestamp('day')->nullable();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->timestamp('completed_at')->nullable();
						
			$table->integer('listening_duration')->default(0);
			
			$table->integer('listened_to_trends')->default(0);
			$table->integer('listened_to_news')->default(0);
			$table->integer('listened_to_browse')->default(0);
			$table->integer('listened_to_recommendations')->default(0);
			$table->integer('listened_to_people')->default(0);
			$table->integer('listened_to_own_playlist')->default(0);
			$table->integer('listened_to_favorite_playlist')->default(0);
			$table->integer('listened_to_searched_songs')->default(0);
			$table->integer('listened_to_channel')->default(0);
			$table->integer('listened_to_custom_channel')->default(0);
			
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
		Schema::dropIfExists('diary_entry_rdio');
	}

}
