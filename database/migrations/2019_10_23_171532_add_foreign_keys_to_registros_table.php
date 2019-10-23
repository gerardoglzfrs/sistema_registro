<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRegistrosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registros', function(Blueprint $table)
		{
			$table->foreign('id_admin', 'fk_registros')->references('id_admin')->on('admins')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('registros', function(Blueprint $table)
		{
			$table->dropForeign('fk_registros');
		});
	}

}
