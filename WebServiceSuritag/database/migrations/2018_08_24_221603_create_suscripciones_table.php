<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuscripcionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suscripciones', function(Blueprint $table)
		{
			$table->integer('idSuscripciones', true);
			$table->integer('Sitios_idSitos')->index('fk_Suscripciones_Sitios1_idx');
			$table->integer('Usuarios_idUsuario')->index('fk_Suscripciones_Usuarios1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suscripciones');
	}

}
