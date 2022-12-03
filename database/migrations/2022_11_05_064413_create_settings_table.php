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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name')->nullable()->default('Repair Shop');
            $table->string('shop_slogan')->nullable()->default('Repairing');
            $table->string('logo')->nullable()->default('logo');
            $table->string('owner_name')->nullable()->default('John Doe');
            $table->text('address')->nullable()->default('Pehsawar');
            $table->string('map_address')->nullable()->default('address');
            $table->string('email')->nullable()->default('test@gmail.com');
            $table->bigInteger('contact_no')->nullable()->default('234234');
            $table->string('web_address')->nullable()->default('www.test.com');
            $table->string('facebook')->nullable()->default('fb.com/test');
            $table->string('whatsapp')->nullable()->default('23423');
            $table->string('instagram')->nullable()->default('instagram.com/test');
            $table->string('youtube')->nullable()->default('youtube.com/test');
            $table->string('tiktok')->nullable()->default('tiktok.com/test');
            $table->string('linkedin')->nullable()->default('linkedin.com/test');
            $table->foreignId('edited_by')->nullable()->constrained('users','id')->default('1');
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
        Schema::dropIfExists('settings');
    }
};
