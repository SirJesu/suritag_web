<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoritosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favoritos', function(Blueprint $table)
		{
			$table->integer('idFavoritos', true);
			$table->integer('Usuarios_idUsuario')->index('fk_Favoritos_Usuarios1_idx');
			$table->integer('Sitios_idSitos')->index('fk_Favoritos_Sitios1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('favoritos');
	}

}
