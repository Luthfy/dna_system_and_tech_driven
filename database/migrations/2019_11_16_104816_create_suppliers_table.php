<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{

    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('id_supplier');
            $table->uuid('uuid_supplier')->unique();
            $table->string("name_supplier", 100);
            $table->longText("address_supplier")->nullable();
            $table->string("phone_supplier", 13)->nullable();
            $table->string("uuid_user", 32)->index();
            $table->timestamps();

            $table->foreign("uuid_user")->references("id")->on("users")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
