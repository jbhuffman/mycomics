<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('url');
			$table->string('phone', 10)->nullable();
			$table->string('address')->nullable();
			$table->string('city', 100)->nullable();
			$table->smallInteger('stateid')->unsigned()->nullable()->index('fk_state_id');
			$table->string('zip', 10)->nullable();
			$table->boolean('is_deleted')->default(0);
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
		Schema::drop('vendors');
	}

}
