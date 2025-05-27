<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MakeNisNullableInSiswasTable extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('nis')->nullable()->change();
            $table->string('alamat')->nullable()->change();
            $table->string('kontak')->nullable()->change();
        });

        // Make ENUM fields nullable using raw SQL
        DB::statement("ALTER TABLE siswas MODIFY gender ENUM('Laki-laki', 'Perempuan') NULL");
        DB::statement("ALTER TABLE siswas MODIFY status_pkl ENUM('belum', 'sudah') NULL");
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('nis')->nullable(false)->change();
            $table->string('alamat')->nullable(false)->change();
            $table->string('kontak')->nullable(false)->change();
        });

        DB::statement("ALTER TABLE siswas MODIFY gender ENUM('Laki-laki', 'Perempuan') NOT NULL");
        DB::statement("ALTER TABLE siswas MODIFY status_pkl ENUM('belum', 'sudah') NOT NULL");
    }
}
