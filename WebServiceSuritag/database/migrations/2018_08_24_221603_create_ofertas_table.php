<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOfertasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ofertas', function(Blueprint $table)
		{
			$table->integer('idOfertas', true);
			$table->timestamp('FechaCreacionOferta')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('TituloOferta', 100);
			$table->string('DescripcionOferta', 200);
			$table->date('FechaValidaOferta');
			$table->time('HoraValidaOferta');
			$table->text('ImagenOferta');
			$table->integer('CantidadPersonaOfertas')->nullable();
			$table->integer('Menues_idMenues')->nullable()->index('fk_Ofertas_Menues1_idx');
			$table->integer('Mesas_idMesas')->nullable()->index('fk_Ofertas_Mesas1_idx');
			$table->boolean('Estado')->nullable()->default(1);
			$table->integer('DescuentoOfertas');
			$table->integer('PagoAdelantadoOfertas');
			$table->integer('Sitos_idSitos')->index('fk_Ofertas_Sitos1_idx');
			$table->integer('TipoOfertas_idTipoOfertas')->index('fk_Ofertas_TipoOfertas1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ofertas');
	}

}
