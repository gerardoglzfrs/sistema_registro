<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHorasServicioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('horas_servicio', function(Blueprint $table)
		{
			$table->foreign('num_control', 'fk_horas_servicio')->references('num_control')->on('alumnos_servicio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('horas_servicio', function(Blueprint $table)
		{
			$table->dropForeign('fk_horas_servicio');
		});
	}

}
