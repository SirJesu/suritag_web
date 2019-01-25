<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOfertasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ofertas', function(Blueprint $table)
		{
			$table->foreign('Menues_idMenues', 'fk_Ofertas_Menues1')->references('idMenues')->on('menues')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Mesas_idMesas', 'fk_Ofertas_Mesas1')->references('idMesas')->on('mesas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Sitos_idSitos', 'fk_Ofertas_Sitos1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('TipoOfertas_idTipoOfertas', 'fk_Ofertas_TipoOfertas1')->references('idTipoOfertas')->on('tipoofertas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ofertas', function(Blueprint $table)
		{
			$table->dropForeign('fk_Ofertas_Menues1');
			$table->dropForeign('fk_Ofertas_Mesas1');
			$table->dropForeign('fk_Ofertas_Sitos1');
			$table->dropForeign('fk_Ofertas_TipoOfertas1');
		});
	}

}
