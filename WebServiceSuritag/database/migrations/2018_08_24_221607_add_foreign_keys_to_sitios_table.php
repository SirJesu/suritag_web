<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSitiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sitios', function(Blueprint $table)
		{
			$table->foreign('Proveedores_idProveedores', 'fk_Sitios_Proveedores1')->references('idProveedores')->on('proveedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Categorias_idCategorias', 'fk_Sitos_Categorias1')->references('idCategorias')->on('categorias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Usuarios_idUsuario', 'fk_Sitos_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sitios', function(Blueprint $table)
		{
			$table->dropForeign('fk_Sitios_Proveedores1');
			$table->dropForeign('fk_Sitos_Categorias1');
			$table->dropForeign('fk_Sitos_Usuarios1');
		});
	}

}
