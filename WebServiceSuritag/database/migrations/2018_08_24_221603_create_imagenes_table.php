<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagenesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagenes', function(Blueprint $table)
		{
			$table->integer('idImagenes', true);
			$table->text('UrlImagen', 16777215);
			$table->integer('Usuarios_idUsuario')->index('fk_Imagenes_Usuarios1_idx');
			$table->integer('Sitios_idSitos')->index('fk_Imagenes_Sitios1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imagenes');
	}

}
