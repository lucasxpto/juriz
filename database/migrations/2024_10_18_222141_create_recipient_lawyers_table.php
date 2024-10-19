<?php

use App\Models\Communication;
use App\Models\Lawyer;
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
        Schema::create('recipient_lawyers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Communication::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Lawyer::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipient_lawyers');
    }
};
