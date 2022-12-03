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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('item_id')->nullable()->constrained('items','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services','id')->onDelete('cascade')->onUpdate('cascade');
            $table->float('balance')->nullable();
            $table->float('discount')->nullable();
            $table->float('net_balance')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('technicians','id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('work_status')->default('pending');
            $table->string('payment_status')->default('pending');
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
        Schema::dropIfExists('work_orders');
    }
};
