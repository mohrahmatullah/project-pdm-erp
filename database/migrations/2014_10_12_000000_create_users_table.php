<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_user');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('wa')->nullable();
            $table->string('pin')->nullable();
            $table->string('id_jenis_user')->nullable();
            $table->string('status_user')->nullable();
            $table->string('delete_mark',1)->nullable();
            $table->string('create_by',30)->nullable();
            $table->timestamp('create_date')->nullable();
            $table->string('update_by',30)->nullable();
            $table->timestamp('update_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
