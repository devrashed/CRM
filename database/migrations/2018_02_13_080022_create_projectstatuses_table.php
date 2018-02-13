<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name');
            $table->integer('developer_id');
            $table->string('project_post');
            $table->string('file_send');
            $table->string('comment');
            $table->integer('project_status');
            $table->integer('status');
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
        Schema::dropIfExists('project_statuses');
    }
}
