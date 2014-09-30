<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('mobile_number');
			$table->string('home_number');
			$table->string('work_number');
			$table->string('avatar');
			$table->string('address');
			$table->string('zipcode');
			$table->string('city');
			$table->integer('group_id');
			$table->integer('company_id');
			$table->longText('extra_information');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
