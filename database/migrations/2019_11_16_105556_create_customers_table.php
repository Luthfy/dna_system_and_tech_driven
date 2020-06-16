<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id_customer');
            $table->uuid('uuid_customer')->unique();
            $table->string('nm_customer');
            $table->string('address_customer')->nullable();
            $table->string('phone_customer', 20)->nullable();
            $table->string('id_user', 32)->index();
            $table->string('email')->unique()->nullable();
            $table->string('photo_customer')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("id_user")->references("id")->on("users")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
