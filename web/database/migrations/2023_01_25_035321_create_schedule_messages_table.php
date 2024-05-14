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
        Schema::create('schedule_messages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['text', 'image', 'audio', 'document', 'video']);
            $table->boolean('is_blast');
            $table->string('file');
            $table->string('number');
            $table->text('message');
            $table->dateTime('start_in');
            $table->dateTime('end_id');
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
        Schema::dropIfExists('schedule_messages');
    }
};
