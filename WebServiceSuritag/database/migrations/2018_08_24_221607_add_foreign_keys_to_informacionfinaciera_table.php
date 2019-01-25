<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInformacionfinacieraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('informacionfinaciera', function(Blueprint $table)
		{
			$table->foreign('Usuarios_idUsuario', 'fk_InformacionFinaciera_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('informacionfinaciera', function(Blueprint $table)
		{
			$table->dropForeign('fk_InformacionFinaciera_Usuarios1');
		});
	}

}
