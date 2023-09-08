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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('user_id');
            $table->integer('contact_id');
            $table->integer('campaign_id')->nullable();
            $table->string('message_type')->default('template');
            $table->string('type')->nullable();
            $table->text('text')->nullable();
            $table->string('media_url')->nullable();
            $table->integer('template_id')->nullable();
            $table->string('template_data')->nullable();
            $table->string('transaction_type')->default('send')->nullable();
            $table->string('wamid')->nullable();
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
        Schema::dropIfExists('messages');
    }
};
