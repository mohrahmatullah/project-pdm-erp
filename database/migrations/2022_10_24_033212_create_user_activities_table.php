<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->increments('no_activity');
            $table->string('id_user',30);
            $table->string('description',300)->nullable();
            $table->string('status',30)->nullable();
            $table->string('menu_id',3)->nullable();
            $table->string('delete_mark',1)->nullable();
            $table->string('create_by',30)->nullable();
            $table->timestamp('create_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activities');
    }
}
