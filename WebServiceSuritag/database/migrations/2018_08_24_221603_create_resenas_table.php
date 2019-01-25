<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResenasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resenas', function(Blueprint $table)
		{
			$table->integer('idReseñas', true);
			$table->string('comentarioResenas', 45)->nullable();
			$table->float('calificacion', 10, 0);
			$table->integer('Usuarios_idUsuario')->index('fk_Resenas_Usuarios1_idx');
			$table->integer('Sitos_idSitos')->index('fk_Resenas_Sitos1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('resenas');
	}

}
