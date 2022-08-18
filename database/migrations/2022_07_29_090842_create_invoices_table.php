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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id')->nullable();
            $table->unsignedBigInteger('hosting_id')->nullable();
            $table->unsignedBigInteger('other_project_id')->nullable();
            $table->unsignedBigInteger('c_type_id');
            $table->unsignedBigInteger('c_info_id');
            $table->string('invoice_details');
            $table->string('time_quote_hour');
            $table->string('time_quote_min');
            $table->string('rate_per_hour');
            $table->string('total_rate');
            $table->string('currency_type');
            $table->string('attachment');
            $table->string('invoice_status');
            $table->string('invoiceDate');
            $table->string('invoiceAlertDate');
            $table->timestamps();
            $table->foreign('domain_id')
                    ->references('id')
                    ->on('domain_details')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('hosting_id')
                    ->references('id')
                    ->on('hosting_details')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
};
