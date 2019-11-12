<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlumnosServicioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alumnos_servicio', function(Blueprint $table)
		{
			$table->integer('num_control')->unique('num_control_UNIQUE');
			$table->string('foto', 100);
			$table->string('nombre', 45);
			$table->string('ape_p', 45);
			$table->string('ape_m', 45);
			$table->string('carrera', 45);
			$table->string('area', 45)->nullable();
			$table->date('inicio_serv');
			$table->integer('id')->index('fk_alumnos_servicio_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alumnos_servicio');
	}

}
