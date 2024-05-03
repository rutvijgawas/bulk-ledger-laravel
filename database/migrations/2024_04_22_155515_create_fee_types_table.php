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
        Schema::create('fee_types', function (Blueprint $table) {
            $table->id();
            $table->string('Fee_category');
            $table->string('F_name')->nullable();
            $table->foreignId('Collection_id');
            $table->foreignId('Br_id');
            $table->integer('Seq_id');
            $table->string('Fee_type_ledger');
            $table->foreignId('Fee_head_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_types');
    }
};
