<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_users', function (Blueprint $table) {
            $table->increments('no_setting');
            $table->string('id_user',30);
            $table->string('menu_id',30);
            $table->string('create_date',30)->nullable();
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
        Schema::dropIfExists('menu_users');
    }
}
