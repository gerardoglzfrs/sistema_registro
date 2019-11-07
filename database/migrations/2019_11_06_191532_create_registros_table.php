<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registros', function(Blueprint $table)
		{
			$table->string('foto', 100);
			$table->integer('num_control');
			$table->string('nombre', 45);
			$table->string('ape_p', 45);
			$table->string('ape_m', 45);
			$table->string('carrera', 45);
			$table->time('hora_ent');
			$table->date('fecha');
			$table->integer('id')->index('fk_registros_idx');
			$table->primary(['num_control','id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registros');
	}

}
