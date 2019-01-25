<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoofertasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipoofertas', function(Blueprint $table)
		{
			$table->integer('idTipoOfertas', true);
			$table->float('ComicionOfertas', 10, 0)->nullable();
			$table->string('DescripcionTipo', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipoofertas');
	}

}
