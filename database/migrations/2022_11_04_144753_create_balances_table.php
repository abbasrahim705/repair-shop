<?php

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
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->nullable()->constrained('items','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services','id')->onDelete('cascade')->onUpdate('cascade');
            $table->float('balance')->nullable();
            $table->float('discount')->nullable();
            $table->float('net_balance')->nullable();
            $table->string('status')->default('due');
            $table->foreignId('approved_by')->nullable()->constrained('users','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('balances');
    }
};
