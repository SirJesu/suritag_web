<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToResenasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('resenas', function(Blueprint $table)
		{
			$table->foreign('Sitos_idSitos', 'fk_Resenas_Sitos1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Usuarios_idUsuario', 'fk_Resenas_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('resenas', function(Blueprint $table)
		{
			$table->dropForeign('fk_Resenas_Sitos1');
			$table->dropForeign('fk_Resenas_Usuarios1');
		});
	}

}
