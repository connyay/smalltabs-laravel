<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('description');
			$table->integer('type');
			$table->integer('day');
			$table->integer('bar_id');
			$table->date('starts_at');
			$table->date('ends_at');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specials');
	}

}
