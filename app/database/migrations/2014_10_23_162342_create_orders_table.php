<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('vendor')->unsigned()->index('fk_order_vendor');
			$table->string('orderno', 15);
			$table->date('date_placed')->nullable();
			$table->date('date_completed')->nullable();
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
		Schema::drop('orders');
	}

}
