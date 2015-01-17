<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMybooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE mybooks MODIFY COLUMN issue VARCHAR(255)');

		Schema::table('mybooks', function(Blueprint $table)
		{
			$table->date('released')->nullable()->after('condition');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::statement('ALTER TABLE mybooks MODIFY COLUMN issue SMALLINT UNSIGNED');

		Schema::table('mybooks', function(Blueprint $table)
		{
			$table->dropColumn('released');
		});
	}

}
