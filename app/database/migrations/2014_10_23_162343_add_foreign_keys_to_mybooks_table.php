<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMybooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mybooks', function(Blueprint $table)
		{
			$table->foreign('titleid', 'mybooks_ibfk_1')->references('id')->on('titles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vendor', 'mybooks_ibfk_2')->references('id')->on('vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mybooks', function(Blueprint $table)
		{
			$table->dropForeign('titleid');
			$table->dropForeign('vendor');
		});
	}

}
