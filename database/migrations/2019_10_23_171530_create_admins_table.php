<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table)
		{
			$table->integer('id_admin', true);
			$table->string('nombre', 45);
			$table->string('ape_p', 45);
			$table->string('ape_m', 45);
			$table->string('area', 45);
			$table->string('correo', 45);
			$table->string('username', 45);
			$table->string('password', 45);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admins');
	}

}
