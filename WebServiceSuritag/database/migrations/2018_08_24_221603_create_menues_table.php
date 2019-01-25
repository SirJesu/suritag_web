<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menues', function(Blueprint $table)
		{
			$table->integer('idMenues', true);
			$table->string('Nombre', 100);
			$table->text('Imagen')->nullable();
			$table->string('Descripcion', 200);
			$table->float('Precio', 10, 0);
			$table->timestamp('FechaCreacion')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('Sitos_idSitos')->index('fk_Menues_Sitos1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menues');
	}

}
