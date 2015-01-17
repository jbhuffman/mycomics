<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->primary();
			$table->string('first', 50)->nullable();
			$table->string('last', 50)->nullable();
			$table->string('username', 50);
			$table->string('password', 64);
			$table->string('email')->nullable();
			$table->boolean('is_deleted')->default(0);
            $table->boolean('is_admin')->default(0);
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
		Schema::drop('users');
	}

}
