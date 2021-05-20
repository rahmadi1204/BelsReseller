<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->id('id_reseller');
            $table->integer('user_id')->unique();
            $table->string('role');
            $table->string('name');
            $table->string('instagram')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('address');
            $table->string('phone');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('resellers');
    }
}
