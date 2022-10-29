<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('id_level',3)->nullable();
            $table->string('menu_name',300);
            $table->string('menu_link',300)->nullable();
            $table->string('menu_icon',300);
            $table->string('parent_id',30);
            $table->string('create_by',30)->nullable();
            $table->timestamp('create_date')->nullable();
            $table->string('delete_mark',1)->nullable();
            $table->string('update_by',30)->nullable();
            $table->date('update_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
