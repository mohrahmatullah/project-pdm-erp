<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_fotos', function (Blueprint $table) {
            $table->increments('no_foto');
            $table->string('id_user',30);
            $table->string('foto',200);
            $table->string('create_by',30)->nullable();
            $table->timestamp('create_date')->nullable();
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
        Schema::dropIfExists('user_fotos');
    }
}
