<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_inventories', function (Blueprint $table) {
            $table->id('id_item_inventory');
            $table->uuid('uuid_item_inventory')->unique();
            $table->string('nm_item_inventory');
            $table->bigInteger('cap_price_item_inventory')->default(0);
            $table->bigInteger('selling_price_item_inventory')->default(0);
            $table->string('picture_item_inventory')->nullable();
            $table->text('notes_item_inventory')->nullable();
            $table->integer('is_sold_out')->default(0);
            $table->string('id_category')->index();
            $table->string('uuid_entry_note', 32)->index();
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
        Schema::dropIfExists('item_inventories');
    }
}
