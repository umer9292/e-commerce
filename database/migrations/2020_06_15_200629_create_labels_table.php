<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label_token', 70)->unique();
            $table->unsignedInteger('order_id')->nullable();
            $table->integer('total_order')->commnet('Number of total order in this label');
            $table->enum('type', ['one-stamp-one-qty', 'one-stamp-mul-qty', 'stamp-one-line', 'stamp-two-line', 'my-pack']);
            $table->enum('action', ['send-again', 'return', 'cancel', 'refund', 'shipping'])->nullable();
            $table->enum('status', ['pending', 'processing', 'delivered', 'failed', 'shipping-label', 'return-label'])->default('pending');
            $table->string('tracking_no', 50)->nullable();
            $table->string('reason', 100)->nullable();
            $table->boolean('is_printed')->default('0');
            $table->boolean('is_merged')->default('1');
            $table->dateTime('delivered_at')->nullable();
            $table->timestamp('generated_at')->useCurrent();
            $table->unsignedInteger('generated_by')->unsigned();
            $table->boolean('is_deleted')->default('0');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('generated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
    }
}
