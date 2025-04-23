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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'estudiante', 'docente', 'usuario'])
                ->default('usuario')
                ->after('email');
            $table->string('image_path')->nullable()->after('role');
            $table->enum('type', ['lider', 'colaborador', 'tesista', 'serviciosocial', 'no'])->default('no')->after('image_path');
            $table->boolean('active')->default(true)->after('type');
            $table->text('bio')->nullable()->after('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('image_path');
            $table->dropColumn('type');
            $table->dropColumn('active');
            $table->dropColumn('bio');
        });
    }
};
