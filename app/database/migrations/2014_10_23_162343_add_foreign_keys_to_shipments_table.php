<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToShipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('shipments', function(Blueprint $table)
		{
			$table->foreign('vendor', 'shipments_ibfk_1')->references('id')->on('vendors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('shipments', function(Blueprint $table)
		{
			$table->dropForeign('vendor');
		});
	}

}
