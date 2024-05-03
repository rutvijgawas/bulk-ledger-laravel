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
        Schema::create('temporary_completedatas', function (Blueprint $table) {
            $table->id();
            $table->string('Date');
            $table->string('Academic_Year');
            $table->string('Session');
            $table->string('Alloted_Category');
            $table->string('Voucher_Type');
            $table->string('Voucher_No', 100)->nullable();
            $table->text('Roll_No', 100)->nullable();
            $table->string('Admno_UniqueId');
            $table->string('Status');
            $table->string('Fee_Category');
            $table->string('Faculty');
            $table->string('Program');
            $table->string('Department');
            $table->string('Batch');
            $table->string('Receipt_No', 100)->nullable();
            $table->string('Fee_Head');
            $table->decimal('Due_Amount', 10, 2);
            $table->decimal('Paid_Amount', 10, 2);
            $table->decimal('Concession_Amount', 10, 2);
            $table->decimal('Scholarship_Amount', 10, 2);
            $table->decimal('Reverse_Concession_Amount', 10, 2);
            $table->decimal('Write_Off_Amount', 10, 2);
            $table->decimal('Adjusted_Amount', 10, 2);
            $table->decimal('Refund_Amount', 10, 2);
            $table->decimal('Fund_Transfer_Amount', 10, 2);
            $table->text('Remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_completedatas');
    }
};
