<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('image_path')->nullable();
            $table->string('name');
            $table->string('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->integer('duration')->nullable();
            $table->string('location')->nullable();
            $table->text('address')->nullable();
            $table->string('meeting_link')->nullable();
            $table->text('materials')->nullable();
            $table->text('prerequisites')->nullable();
            $table->string('target_audience')->nullable();
            $table->string('language')->nullable();
            $table->string('syllabus_url')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('qr_code_link')->nullable();
            $table->integer('capacity')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->enum('type', ['taller', 'curso', 'curso-taller', 'diplomado'])->default('curso');
            $table->text('syllabus')->nullable();
            $table->integer('modules')->nullable();
            $table->integer('credits')->nullable();
            $table->enum('frequency', ['unico', 'semanal', 'mensual', 'otro'])->nullable();
            $table->text('methodology')->nullable();
            $table->enum('status', ['borrador', 'publicado', 'completado', 'cancelado', 'archivado'])->default('borrador');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('name');
            $table->index('start_time');
            $table->index('type');
            $table->index('status');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
