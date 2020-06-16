<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailExitNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_exit_notes', function (Blueprint $table) {
            $table->id('id_detail_exit_note');
            $table->uuid('uuid_detail_exit_note')->unique();
            $table->string('uuid_exit_note', 32)->index();
            $table->string('uuid_item_inventory', 32)->index();
            $table->bigInteger('cap_price_exit_notes')->default(0);
            $table->bigInteger('sell_price_exit_notes')->default(0);
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
        Schema::dropIfExists('detail_exit_notes');
    }
}
