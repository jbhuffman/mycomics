<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTitlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('titles', function(Blueprint $table)
		{
			$table->smallInteger('id', true)->unsigned();
			$table->string('title');
			$table->smallInteger('publisher_id')->unsigned()->index('FK_publisher');
			$table->string('time_frame', 64);
			$table->enum('series_type', array('limited','maxi','one - shot','normal'))->default('normal');
			$table->text('main_issues')->nullable();
			$table->text('annuals')->nullable();
			$table->text('specials')->nullable();
			$table->text('missing_issues')->nullable();
			$table->text('comments')->nullable();
			$table->boolean('is_active');
			$table->boolean('is_complete');
			$table->boolean('is_subscribed');
			$table->boolean('is_deleted');
			$table->dateTime('created')->default('0000-00-00 00:00:00');
			$table->dateTime('modified')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('titles');
	}

}
