<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMesasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mesas', function(Blueprint $table)
		{
			$table->integer('idMesas', true);
			$table->string('NombreMesa', 60);
			$table->float('ValorPorPersonaMesa', 10, 0);
			$table->boolean('EstadoMesa')->nullable()->default(1);
			$table->float('PorcentajeAdelantoMesa', 10, 0);
			$table->integer('Sitos_idSitos')->index('fk_Mesas_Sitos1_idx');
			$table->integer('Piso_idPiso')->index('fk_Mesas_Piso1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mesas');
	}

}
