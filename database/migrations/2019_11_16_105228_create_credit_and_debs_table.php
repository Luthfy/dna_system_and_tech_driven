<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditAndDebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_and_debs', function (Blueprint $table) {
            $table->id('id_credit_and_debs');
            $table->uuid('uuid_credit_and_debs')->unique();
            $table->integer('number_note_credit_and_debs');
            $table->string('from_credit_and_debs', 11);
            $table->integer('total_credit_and_debs');
            $table->string('status_note_and_debs', 20);
            $table->string("id_user", 32)->index();
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
        Schema::dropIfExists('credit_and_debs');
    }
}
