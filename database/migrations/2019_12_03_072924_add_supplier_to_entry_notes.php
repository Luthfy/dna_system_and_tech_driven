<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupplierToEntryNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entry_notes', function (Blueprint $table) {
            $table->foreign("uuid_supplier")->references("uuid_supplier")->on("suppliers")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entry_notes', function (Blueprint $table) {
            //
        });
    }
}
