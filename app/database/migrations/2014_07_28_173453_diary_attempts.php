<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryAttempts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diary_attempts', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->timestamp('created_at');
			$table->timestamp('updated_at');
			$table->timestamp('completed_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diary_attempts');
	}

}
