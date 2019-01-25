<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInformacionfinacieraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informacionfinaciera', function(Blueprint $table)
		{
			$table->integer('idInformacionFinaciera', true);
			$table->string('targetID', 200)->unique('targetID_UNIQUE');
			$table->string('idClient', 200)->unique('idClient_UNIQUE');
			$table->integer('Usuarios_idUsuario')->index('fk_InformacionFinaciera_Usuarios1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('informacionfinaciera');
	}

}
