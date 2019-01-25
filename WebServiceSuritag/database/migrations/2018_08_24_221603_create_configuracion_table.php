<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfiguracionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuracion', function(Blueprint $table)
		{
			$table->integer('idConfiguracion', true);
			$table->float('PorcentajePorReserva', 10, 0)->nullable()->default(20);
			$table->float('valorPlan', 10, 0)->nullable()->default(10);
			$table->integer('Sitios_idSitos')->index('fk_Configuracion_Sitios1_idx');
			$table->string('isPreminum', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configuracion');
	}

}
