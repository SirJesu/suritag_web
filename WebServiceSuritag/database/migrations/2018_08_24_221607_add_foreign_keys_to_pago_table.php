<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pago', function(Blueprint $table)
		{
			$table->foreign('Reserva_idReserva', 'fk_Pago_Reserva1')->references('idReserva')->on('reserva')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Usuarios_idUsuario', 'fk_Pago_Usuarios1')->references('idUsuario')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pago', function(Blueprint $table)
		{
			$table->dropForeign('fk_Pago_Reserva1');
			$table->dropForeign('fk_Pago_Usuarios1');
		});
	}

}
