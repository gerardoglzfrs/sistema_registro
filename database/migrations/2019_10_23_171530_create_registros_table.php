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
			$table->integer('num_control')->primary();
			$table->string('nombre', 45);
			$table->string('ape_p', 45);
			$table->string('ape_m', 45);
			$table->string('carrera', 45);
			$table->time('hora_ent');
			$table->time('hora_sal')->nullable();
			$table->date('fecha');
			$table->integer('id_admin')->nullable()->index('fk_registros_idx');
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
