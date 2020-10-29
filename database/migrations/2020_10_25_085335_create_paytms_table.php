<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaytmsTable extends Migration
{
    public function up()
    {
        Schema::create('paytm', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->bigInteger('mobile');
            $table->string('email');
            $table->tinyInteger('status')->default(0);
            $table->integer('amount');
            $table->integer('due_amount');
            $table->string('order');
            $table->string('transaction_id')->default(0);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('paytm');
    }
}