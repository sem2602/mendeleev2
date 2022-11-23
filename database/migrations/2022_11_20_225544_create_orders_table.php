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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('ext_id')->nullable();
            $table->foreignId('setting_id')->constrained('settings');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('delivery_provider_id')->constrained('delivery_providers');
            $table->integer('delivery_provider_ext')->nullable();
            $table->foreignId('sender_id')->constrained('senders');
            $table->string('recipient_city_ref')->nullable();
            $table->string('recipient_city')->nullable();
            $table->text('recipient_address')->nullable();
            $table->string('warehouse_type')->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_method')->nullable();
            $table->float('weight', 10, 3)->nullable();
            $table->float('seats', 10, 3)->nullable();
            $table->string('ttn')->nullable();
            $table->string('ttn_ref')->nullable();
            $table->float('delivery_cost', 10, 2)->nullable();
            $table->float('total', 10, 2)->nullable();
            $table->foreignId('status_id')->constrained('order_statuses');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('orders');
    }
};
