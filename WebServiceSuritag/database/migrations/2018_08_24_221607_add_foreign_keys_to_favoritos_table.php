<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFavoritosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('favoritos', function(Blueprint $table)
		{
			$table->foreign('Sitios_idSitos', 'fk_Favoritos_Sitios1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Usuarios_idUsuario', 'fk_Favoritos_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('favoritos', function(Blueprint $table)
		{
			$table->dropForeign('fk_Favoritos_Sitios1');
			$table->dropForeign('fk_Favoritos_Usuarios1');
		});
	}

}
