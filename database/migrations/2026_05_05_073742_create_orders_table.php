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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('service_type')->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('thickness', 8, 2)->nullable();
            $table->string('size')->nullable();

            $table->string('service_name')->nullable();
            $table->text('comment')->nullable();
            $table->string('status')->default('new');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
