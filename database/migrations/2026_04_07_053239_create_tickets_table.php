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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('work_image', 255);
            $table->string('title', 255);
            $table->text('desc');
            $table->string('status', 255);
            $table->string('priority', 255);
            $table->dateTime('tgl_sla');
            $table->foreignId('employee_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('engineer_id')->constrained('users', 'id')->onDelete('cascade');
            $table->timestamps(); // -> created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
