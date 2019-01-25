<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToImagenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('imagenes', function(Blueprint $table)
		{
			$table->foreign('Sitios_idSitos', 'fk_Imagenes_Sitios1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Usuarios_idUsuario', 'fk_Imagenes_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('imagenes', function(Blueprint $table)
		{
			$table->dropForeign('fk_Imagenes_Sitios1');
			$table->dropForeign('fk_Imagenes_Usuarios1');
		});
	}

}
