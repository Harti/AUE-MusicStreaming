<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecommenderColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diary_entry_spotify', function($table)
		{
			$table->float('recommender_percentage');
		});
		Schema::table('diary_entry_rdio', function($table)
		{
			$table->float('recommender_percentage');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diary_entry_spotify', function($table)
		{
			$table->dropColumn('recommender_percentage');
		});
		Schema::table('diary_entry_rdio', function($table)
		{
			$table->dropColumn('recommender_percentage');
		});
	}

}
