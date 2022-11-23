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
            $table->foreignId('setting_id')->constrained('settings');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('delivery_provider_id')->default(null)->constrained('settings');
            $table->integer('delivery_provider_ext')->default(null);
            $table->foreignId('sender_id')->default(null)->constrained('senders');
            $table->string('recipient_city_ref');
            $table->string('recipient_city');
            $table->text('recipient_address');
            $table->string('warehouse_type');
            $table->string('payment');
            $table->string('payment_method');
            $table->float('weight', 10, 3);
            $table->float('seats', 10, 3);
            $table->string('ttn');
            $table->string('ttn_ref');
            $table->float('delivery_cost', 10, 2);
            $table->float('total', 10, 2);
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
