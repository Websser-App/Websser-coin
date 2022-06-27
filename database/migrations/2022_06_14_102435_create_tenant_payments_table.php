<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buildings_id')->unsigned()->nullable();
            $table->integer('depataments_id')->unsigned()->nullable();
            $table->integer('tenants_id')->unsigned()->nullable();
            $table->integer('bills_id')->unsigned()->nullable();
            $table->integer('amount')->nullable()->nullable();
            $table->boolean('isActive')->nullable()->default('1');
            $table->foreign('buildings_id')->references('id')->on('buildings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('depataments_id')->references('id')->on('depataments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tenants_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bills_id')->references('id')->on('bills')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tenant_payments');
    }
}
