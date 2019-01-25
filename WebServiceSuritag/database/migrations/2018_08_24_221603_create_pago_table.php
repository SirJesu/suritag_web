<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pago', function(Blueprint $table)
		{
			$table->integer('idPago', true);
			$table->timestamp('FechaPago')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->float('Cantidad', 10, 0);
			$table->string('IdTransaccion', 100)->nullable();
			$table->integer('Reserva_idReserva')->index('fk_Pago_Reserva1_idx');
			$table->integer('Usuarios_idUsuario')->index('fk_Pago_Usuarios1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pago');
	}

}
