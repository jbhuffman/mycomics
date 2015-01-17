<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMybooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mybooks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->smallInteger('titleid')->unsigned()->index('titleid');
			$table->smallInteger('issue')->unsigned();
			$table->string('printing', 25)->default('1st');
			$table->enum('condition', array('mint','near mint','very fine','fine','very good','good','fair','poor'))->nullable();
			$table->text('comments');
			$table->integer('vendor')->unsigned()->nullable()->index('fk_vendor_id');
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
		Schema::drop('mybooks');
	}

}
