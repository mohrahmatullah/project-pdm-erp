<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIErrorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_error_applications', function (Blueprint $table) {
            $table->increments('error_id');
            $table->string('id_user',30);
            $table->timestamp('error_date')->nullable();
            $table->string('modules',100)->nullable();
            $table->string('controller',200)->nullable();
            $table->string('function',200)->nullable();
            $table->string('error_line',30)->nullable();
            $table->string('error_message',1000)->nullable();
            $table->string('status',30)->nullable();
            $table->string('param',300)->nullable();
            $table->timestamp('create_date')->nullable();
            $table->timestamp('create_time')->nullable();
            $table->string('delete_mark',1)->nullable();
            $table->string('update_by',30)->nullable();
            $table->timestamp('update_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('i_error_applications');
    }
}
