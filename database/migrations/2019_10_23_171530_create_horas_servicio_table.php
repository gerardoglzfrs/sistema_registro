<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHorasServicioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horas_servicio', function(Blueprint $table)
		{
			$table->integer('num_control')->primary();
			$table->string('fecha', 45);
			$table->time('hora_ent');
			$table->time('hora_sal')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('horas_servicio');
	}

}
