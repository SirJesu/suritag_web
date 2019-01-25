<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReservaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reserva', function(Blueprint $table)
		{
			$table->foreign('Mesas_idMesas', 'fk_Reserva_Mesas1')->references('idMesas')->on('mesas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Ofertas_idOfertas', 'fk_Reserva_Ofertas1')->references('idOfertas')->on('ofertas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Sitos_idSitos', 'fk_Reserva_Sitos1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Usuarios_idUsuario', 'fk_Reserva_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reserva', function(Blueprint $table)
		{
			$table->dropForeign('fk_Reserva_Mesas1');
			$table->dropForeign('fk_Reserva_Ofertas1');
			$table->dropForeign('fk_Reserva_Sitos1');
			$table->dropForeign('fk_Reserva_Usuarios1');
		});
	}

}
