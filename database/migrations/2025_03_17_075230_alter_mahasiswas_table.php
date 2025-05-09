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
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nobp', 'nim');
            $table->string('alamat')->nullable()->after('email');
            $table->dropColumn('tgllahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn('nim', 'nobp');
            $table->dropColumn('alamat');
            $table->date('tgllahir')->after('email')->nullable();
        });
    }
};
