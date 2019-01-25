<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->integer('idProductos')->primary();
			$table->string('nombre', 100)->nullable();
			$table->string('identificador', 100);
			$table->string('Descripcion', 100)->nullable();
			$table->integer('UnidadesDisponibles')->nullable();
			$table->text('imagen')->nullable();
			$table->float('precio', 10, 0)->nullable();
			$table->timestamp('fechaCreacion')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('Proveedores_idProveedores')->index('fk_Productos_Proveedores1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
