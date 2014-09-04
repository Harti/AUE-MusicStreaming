<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StreamerChanges extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('screener_attempts', function($table)
		{
			$table->dropColumn('disliked_service');
			$table->dropColumn('disliked_known');
			$table->dropColumn('disliked_look');
			$table->dropColumn('disliked_features');
			$table->dropColumn('disliked_other');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('screener_attempts', function($table)
		{
			$table->string('disliked_service')->nullable();
			$table->string('disliked_known')->nullable();
			$table->string('disliked_look')->nullable();
			$table->string('disliked_features')->nullable();
			$table->string('disliked_other')->nullable();
		});
	}

}
