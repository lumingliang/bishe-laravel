<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIotUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

		Schema::create('iot_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name' , 20);
			$table->string('email' , 20)->unique();
			$table->string('password', 60);
			$table->string('phone' , 15);
			$table->string('qqId' , 30);
			$table->string('qqtoken' , 40);
			$table->rememberToken();
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
        //
    }
}
