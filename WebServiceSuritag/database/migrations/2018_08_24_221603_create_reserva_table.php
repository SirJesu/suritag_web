<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reserva', function(Blueprint $table)
		{
			$table->integer('idReserva', true);
			$table->timestamp('FechaCreacion')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->date('FechaReserva');
			$table->time('HoraReserva');
			$table->integer('CantidadPersonas')->nullable();
			$table->integer('Usuarios_idUsuario')->index('fk_Reserva_Usuarios1_idx');
			$table->integer('Mesas_idMesas')->nullable()->index('fk_Reserva_Mesas1_idx');
			$table->integer('Ofertas_idOfertas')->nullable()->index('fk_Reserva_Ofertas1_idx');
			$table->integer('Sitos_idSitos')->index('fk_Reserva_Sitos1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reserva');
	}

}
