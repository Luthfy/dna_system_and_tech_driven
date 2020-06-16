<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExitAndItemToDetailExitNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_exit_notes', function (Blueprint $table) {
            $table->foreign("uuid_exit_note")->references("uuid_exit_note")->on("exit_notes")->cascadeOnDelete();
            $table->foreign("uuid_item_inventory")->references("uuid_item_inventory")->on("item_inventories")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_exit_notes', function (Blueprint $table) {
            //
        });
    }
}
