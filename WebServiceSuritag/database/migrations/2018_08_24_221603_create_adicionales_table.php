<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdicionalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adicionales', function(Blueprint $table)
		{
			$table->integer('idAdicionales', true);
			$table->boolean('Estado')->nullable();
			$table->timestamp('fechaCreacion')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('cantidad')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adicionales');
	}

}
