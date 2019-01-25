<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMesasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mesas', function(Blueprint $table)
		{
			$table->foreign('Piso_idPiso', 'fk_Mesas_Piso1')->references('idPiso')->on('piso')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Sitos_idSitos', 'fk_Mesas_Sitos1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mesas', function(Blueprint $table)
		{
			$table->dropForeign('fk_Mesas_Piso1');
			$table->dropForeign('fk_Mesas_Sitos1');
		});
	}

}
