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
        Schema::create('domain_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_type_id');
            $table->unsignedBigInteger('c_info_id');
            $table->string('domain_name');
            $table->unsignedBigInteger('domain_registar_id');
            $table->integer('number_of_year');
            $table->string('domain_start_date');
            $table->string('domain_end_date');
            $table->timestamps();
            $table->foreign('c_type_id')
                    ->references('id')
                    ->on('client_type')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('c_info_id')
                    ->references('id')
                    ->on('client_info')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('domain_registar_id')
                    ->references('id')
                    ->on('domain_registars')
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
        Schema::dropIfExists('domain_details');
    }
};
