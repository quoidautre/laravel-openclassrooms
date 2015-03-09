<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/* EMAILS --------------------------------------------------------- */
		Schema::create('emails', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 100);
		});

		/* EMAILS --------------------------------------------------------- */

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		/* EMAILS --------------------------------------------------------- */
		Schema::drop('emails');
	}

}
