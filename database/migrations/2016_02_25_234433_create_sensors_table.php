<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('sensors', function( Blueprint $table ) {
			$table->increments('id');
			$table->integer('user_id')->index();
			$table->string('name', 10);
			$table->string('unit', 10);
			$table->string('math', 10);
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
