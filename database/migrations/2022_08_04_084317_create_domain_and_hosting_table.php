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
        Schema::create('domain_and_hosting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_type_id');
            $table->unsignedBigInteger('c_info_id');
            $table->string('dh_hosting_name');
            $table->unsignedBigInteger('dh_hosting_provider_id');
            $table->string('dh_domain_name');
            $table->unsignedBigInteger('dh_domain_registrar_id');
            $table->integer('dh_number_of_year');
            $table->string('dh_start_date');
            $table->string('dh_end_date');
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
            $table->foreign('dh_hosting_provider_id')
                    ->references('id')
                    ->on('hosting_providers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('dh_domain_registrar_id')
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
        Schema::dropIfExists('domain_and_hosting');
    }
};
