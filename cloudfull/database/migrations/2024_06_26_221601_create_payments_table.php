<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('order_id', 256)->nullable()->comment('Уникальный идентификатор счета в платежной системе.');
            $table->decimal('amount', 32, 16);
            $table->string('currency', 32);
            $table->enum('payment_type', ['deposit', 'withdrawal']);
            $table->string('payment_system', 64);
            $table->json('payment_details')->nullable()->comment('Дополнительные данные о платеже, хранимые в формате JSON.');
            $table->string('status', 64)->default('process');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
