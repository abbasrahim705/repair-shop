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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string("name", 120)->nullable();
            $table->string("email", 255)->nullable();
            $table->string("phone")->nullable();
            $table->text("address")->nullable();
            // $table->enum("experience",[0, 1, 2, 3, 4, 5])->default(0);
            // $table->integer('registration')->nullable();
            $table->enum("status",[0, 1])->default(1);
            $table->string('image', 2000)->nullable();
            $table->foreignId('created_id')->constrained('users','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('technicians');
    }
};
