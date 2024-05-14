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
        Schema::create('receive_messages', function (Blueprint $table) {
            $table->id();
            $table->string('msg_type');
            $table->string('from_name');
            $table->string('from_number');
            $table->string('number');
            $table->boolean('isGroup');
            $table->text('message');
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
        Schema::dropIfExists('receive_messages');
    }
};
