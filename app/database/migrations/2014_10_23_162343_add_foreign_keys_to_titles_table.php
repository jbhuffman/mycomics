<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTitlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('titles', function(Blueprint $table)
		{
			$table->foreign('publisher_id', 'FK_publisher')->references('id')->on('publishers')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('titles', function(Blueprint $table)
		{
			$table->dropForeign('publisher_id');
		});
	}

}
