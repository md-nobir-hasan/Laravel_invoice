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
        Schema::table('invoices', function (Blueprint $table) {
            // $table->unsignedBigInteger('domain_id')->nullable();
            // $table->foreign('dh_domain_registrar_id')
            // ->references('id')
            // ->on('domain_registars')
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            $table->unsignedBigInteger('domain_and_hosting_id')->nullable()->after("dh_hosting_provider_id");
            $table->foreign('domain_and_hosting_id')
                    ->references('id')
                    ->on('domain_and_hosting')
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
        Schema::table('invoices', function (Blueprint $table) {
            // $table->dropForeign("domain_and_hosting_id");
            $table->dropForeign('domain_and_hosting_id');
            $table->dropColumn('domain_and_hosting_id');
            // dropConstrai
        });
    }
};
