<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo',50);
			$table->string('descricao',200);
			$table->string('autor',40);
			$table->date('criado_em');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noticias');
	}

}
