<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVendorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vendors', function(Blueprint $table)
		{
			$table->foreign('stateid', 'vendors_ibfk_1')->references('id')->on('states')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vendors', function(Blueprint $table)
		{
			$table->dropForeign('stateid');
		});
	}

}
