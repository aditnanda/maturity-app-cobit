<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListOfServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('list_of_service', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama_service', 50);
			$table->string('status', 20);
			$table->string('service_owner', 30);
			$table->date('updated_at')->nullable();
			$table->date('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('list_of_service');
	}

}
