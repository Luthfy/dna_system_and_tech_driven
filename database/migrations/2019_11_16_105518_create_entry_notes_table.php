<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryNotesTable extends Migration
{

    public function up()
    {
        Schema::create('entry_notes', function (Blueprint $table) {
            $table->id('id_entry_note');
            $table->uuid('uuid_entry_note')->unique();
            $table->string('no_entry_note');
            $table->date('date_entry_note');
            $table->integer('qty_entry_note');
            $table->bigInteger('total_entry_note');
            $table->string('status_entry_note');
            $table->string('picture_entry_note')->nullable();
            $table->string('uuid_supplier', 32)->index();
            $table->string('id_user', 32)->index();
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
        Schema::dropIfExists('entry_notes');
    }
}
