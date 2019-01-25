<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menues', function(Blueprint $table)
		{
			$table->foreign('Sitos_idSitos', 'fk_Menues_Sitos1')->references('idSitos')->on('sitios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menues', function(Blueprint $table)
		{
			$table->dropForeign('fk_Menues_Sitos1');
		});
	}

}
