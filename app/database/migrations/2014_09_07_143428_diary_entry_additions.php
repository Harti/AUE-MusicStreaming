<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryEntryAdditions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diary_entry', function($table)
		{
			$table->integer('listening_duration')->default(0);
			$table->integer('listened_to_own_playlists')->default(0);
			$table->integer('listened_to_discover')->default(0);
			$table->integer('listened_to_browse')->default(0);
			$table->integer('listened_to_curated_playlists')->default(0);
			$table->integer('listened_to_radio')->default(0);
			$table->integer('listened_to_searched_songs')->default(0);
			$table->integer('recommendations_quality')->default(0);
			$table->integer('recommendations_comparison')->default(0);
			$table->integer('most_listened')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diary_entry', function($table)
		{
			$table->dropColumn('listening_duration');
			$table->dropColumn('listened_to_own_playlists');
			$table->dropColumn('listened_to_discover');
			$table->dropColumn('listened_to_browse');
			$table->dropColumn('listened_to_curated_playlists');
			$table->dropColumn('listened_to_radio');
			$table->dropColumn('listened_to_searched_songs');
			$table->dropColumn('recommendations_quality');
			$table->dropColumn('recommendations_comparison');
			$table->dropColumn('most_listened');
		});
	}

}
