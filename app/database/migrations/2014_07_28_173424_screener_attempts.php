<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ScreenerAttempts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('screener_attempts', function($table)
		{
			$table->increments('id');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->timestamp('completed_at')->nullable();
			$table->string('preferred_service')->nullable();
			$table->string('preferred_known')->nullable();
			$table->string('preferred_look')->nullable();
			$table->string('preferred_features')->nullable();
			$table->string('preferred_other')->nullable();
			$table->string('disliked_service')->nullable();
			$table->string('disliked_known')->nullable();
			$table->string('disliked_look')->nullable();
			$table->string('disliked_features')->nullable();
			$table->string('disliked_other')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::down('screener_attempts');
	}

}
