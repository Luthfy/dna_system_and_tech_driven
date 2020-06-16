<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExitNotesTable extends Migration
{

    public function up()
    {
        Schema::create('exit_notes', function (Blueprint $table) {
            $table->id('id_exit_note');
            $table->uuid('uuid_exit_note')->unique();
            $table->date('date_exit_note');
            $table->integer('total_exit_note');
            $table->string('status_exit_note', 20);
            $table->string('uuid_customer')->index();
            $table->string('id_user')->index();
            $table->timestamps();

            $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exit_notes');
    }
}
