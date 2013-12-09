<?php

use Illuminate\Database\Migrations\Migration;

class CreateAwardoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('awardone', function($table)
	    {
	        $table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users')->on_delete('restrict');
 			$table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
	        $table->string('vote');
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