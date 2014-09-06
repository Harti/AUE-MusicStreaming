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
		Schema::create('diary_entry', function($table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->timestamp('day')->nullable();
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
		Schema::dropIfExists('diary_entry');
	}

}
