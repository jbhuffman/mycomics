<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShipmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('vendor')->unsigned()->index('fk_shipment_vendor');
			$table->string('shipmentno', 15);
			$table->date('date_sent');
			$table->date('date_received')->nullable();
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
		Schema::drop('shipments');
	}

}
