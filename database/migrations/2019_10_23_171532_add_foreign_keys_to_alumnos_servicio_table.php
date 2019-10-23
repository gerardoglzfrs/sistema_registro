<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlumnosServicioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alumnos_servicio', function(Blueprint $table)
		{
			$table->foreign('id_admin', 'fk_alumnos_servicio')->references('id_admin')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alumnos_servicio', function(Blueprint $table)
		{
			$table->dropForeign('fk_alumnos_servicio');
		});
	}

}
