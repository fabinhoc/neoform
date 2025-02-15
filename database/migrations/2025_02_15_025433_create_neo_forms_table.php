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
        Schema::create('e_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_manager_id')->constrained()->cascadeOnDelete();
            $table->string('code');
            $table->string('name');
            $table->decimal('sla', 10,2);
            $table->string('description')->nullable();
            $table->integer('status')->default(2);
            $table->enum('type', ['STEPS', 'BASIC', 'APPROVAL'])->default('BASIC');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_forms');
    }
};
