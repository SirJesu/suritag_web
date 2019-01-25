<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->integer('idUsuario', true);
			$table->string('NombreUsuario', 80);
			$table->text('ImagenUsuario')->nullable();
			$table->string('TelefonoUsuario', 20)->nullable();
			$table->string('CorreoUsuario', 60)->unique('CorreoUsuario_UNIQUE');
			$table->string('direccionFisicaUsuario', 100)->nullable();
			$table->string('UsuarioIDUsuario', 100)->nullable();
			$table->string('claveDeAccesoUsuario', 100)->nullable();
			$table->boolean('AceptoTerminos')->default(1);
			$table->boolean('ConfirmedEmail')->nullable()->default(0);
			$table->integer('TipoUsuarios_idTipoUsuario')->index('fk_Usuarios_TipoUsuarios_idx');
			$table->timestamp('fechaCreacion')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('Plataforma')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuarios');
	}

}
