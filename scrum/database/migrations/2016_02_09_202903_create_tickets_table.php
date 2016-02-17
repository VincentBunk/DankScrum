<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('title');
	        $table->integer('status_id')->unsigned();
	        $table->integer('severity_id')->unsigned();
	        $table->integer('ticket_type_id')->unsigned();
	        $table->text('description');
	        $table->float('progress');
	        $table->float('est_time');
	        $table->timestamp('start');
	        $table->timestamp('end');
	        $table->integer('user_id')->index();
	        $table->integer('creator_id')->unsigned();
	        $table->integer('project_id')->unsigned();
	        $table->integer('comments_id')->unsigned();
            $table->timestamps();
        });

	    Schema::table('tickets', function($table) {
		    $table->foreign('status_id')->references('id')->on('status');
		    $table->foreign('severity_id')->references('id')->on('severities');
		    $table->foreign('ticket_type_id')->references('id')->on('ticket_types');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
