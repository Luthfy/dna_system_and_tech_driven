<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntryNotesToItemInventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_inventories', function (Blueprint $table) {
            $table->foreign("id_category")->references("id_category")->on("categories")->cascadeOnDelete();
            $table->foreign("uuid_entry_note")->references("uuid_entry_note")->on("entry_notes")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_inventories', function (Blueprint $table) {
            //
        });
    }
}
