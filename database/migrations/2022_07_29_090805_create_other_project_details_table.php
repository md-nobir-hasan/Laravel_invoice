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
        Schema::create('other_project_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_type_id');
            $table->unsignedBigInteger('c_info_id');
            $table->string('project_name');
            $table->string('project_details');
            $table->string('project_start_date');
            $table->string('project_time_quote');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_project_details');
    }
};
