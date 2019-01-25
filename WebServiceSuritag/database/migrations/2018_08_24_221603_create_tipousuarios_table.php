<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipousuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipousuarios', function(Blueprint $table)
		{
			$table->integer('idTipoUsuario', true);
			$table->string('descripcionTipoUsuario', 30);
			$table->float('Costo', 10, 0)->nullable();
			$table->integer('tipoPago');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tipousuarios');
	}

}
