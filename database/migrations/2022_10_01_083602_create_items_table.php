->nullable()<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("description")->nullable();
            $table->float("amount")->nullable();
            $table->string('image', 2000)->nullable();
            $table->string("serial_no")->unique()->nullable();
            $table->foreignId('category_id')->constrained('categories','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('created_by')->constrained('users','id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
