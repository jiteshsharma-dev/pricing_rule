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
        Schema::create('price_rule_targets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('promotion_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('target_type', [
                'product',
                'category',
                'brand',
                'customer_group',
                'cart'
            ]);

            $table->unsignedBigInteger('target_id')->nullable();

            $table->timestamps();

            $table->index(['target_type', 'target_id']);
            $table->index('promotion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_rule_targets');
    }
};
