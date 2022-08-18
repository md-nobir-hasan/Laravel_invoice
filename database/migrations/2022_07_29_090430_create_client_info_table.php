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
        Schema::create('client_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_type_id');
            $table->string('c_name');
            $table->string('c_website');
            $table->string('c_email');
            $table->string('c_phone');
            $table->string('c_address');
            $table->timestamps();
            $table->foreign('c_type_id')
                    ->references('id')
                    ->on('client_type')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_info');
    }
};
