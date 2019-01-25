<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSitiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sitios', function(Blueprint $table)
		{
			$table->integer('idSitos', true);
			$table->string('IdentificadorSitio', 200)->nullable()->unique('Identificador_UNIQUE');
			$table->float('latitudSitio', 10, 0)->nullable();
			$table->float('logitudSitio', 10, 0)->nullable();
			$table->string('direccionSitio', 200)->nullable();
			$table->text('ImagenPrimariaSitio')->nullable();
			$table->text('ImagenSecundariaSitio')->nullable();
			$table->integer('Usuarios_idUsuario')->index('fk_Sitos_Usuarios1_idx');
			$table->integer('Categorias_idCategorias')->index('fk_Sitos_Categorias1_idx');
			$table->boolean('NuevoSitio')->nullable()->default(0);
			$table->string('NombreSitio', 200);
			$table->string('Telefono', 100)->nullable();
			$table->timestamp('FechaCreacion')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('Proveedores_idProveedores')->index('fk_Sitios_Proveedores1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sitios');
	}

}
