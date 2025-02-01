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
        Schema::table('retiro2025', function (Blueprint $table) {
            $table->enum('carro', [
                0, 1, 2, 3, 4, 5

                // 0 - Sim e posso dar carona
                // 1 - Sim e não tenho espaço para carona
                // 2 - Não e preciso de carona
                // 3 - Não, mas já tenho carona
            ])->nullable()->after('vegetariano');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('retiro2025', function (Blueprint $table) {
            $table->dropColumn('carro');
        });
    }
};
