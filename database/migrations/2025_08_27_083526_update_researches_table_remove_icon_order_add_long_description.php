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
        Schema::table('researches', function (Blueprint $table) {
            $table->dropColumn(['icon', 'order']);
            $table->longText('long_description')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('researches', function (Blueprint $table) {
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->dropColumn('long_description');
        });
    }
};
