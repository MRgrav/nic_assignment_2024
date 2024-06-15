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
        Schema::create('schemes', function (Blueprint $table) {
            $table->id();
            $table->string("scheme_code")->nullable();
            $table->string("scheme_name")->nullable();
            $table->string("central_state_scheme")->nullable();
            $table->string("financial_year")->nullable();
            $table->decimal("state_disbursement", 12,2)->nullable();
            $table->decimal("central_disbursement", 12,2)->nullable();
            $table->decimal("total_disbursement", 12,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schemes');
    }
};
