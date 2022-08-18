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
        Schema::create('hosting_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_type_id');
            $table->unsignedBigInteger('c_info_id');
            $table->string('hosting_name');
            $table->unsignedBigInteger('hosting_provider_id');
            $table->string('hosting_domain_name');
            $table->integer('number_of_year');
            $table->string('hosting_start_date');
            $table->string('hosting_end_date');
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
            $table->foreign('hosting_provider_id')
                    ->references('id')
                    ->on('hosting_providers')
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
        Schema::dropIfExists('hosting_details');
    }
};
