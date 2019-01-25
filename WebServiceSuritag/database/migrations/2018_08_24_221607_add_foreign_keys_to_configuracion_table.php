<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConfiguracionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('configuracion', function(Blueprint $table)
		{
			$table->foreign('Sitios_idSitos', 'fk_Configuracion_Sitios1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('configuracion', function(Blueprint $table)
		{
			$table->dropForeign('fk_Configuracion_Sitios1');
		});
	}

}
