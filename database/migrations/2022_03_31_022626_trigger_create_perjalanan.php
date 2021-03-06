<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER add_catatan AFTER INSERT ON catatans FOR EACH ROW
            BEGIN
                INSERT INTO logs (logs.user_id, logs.aktivitas, logs.nama_tempat, logs.alamat, logs.tanggal_perjalanan, logs.jam_perjalanan, logs.suhu_tubuh, logs.deskripsi, logs.nama_tempat_lama, logs.alamat_lama, logs.tanggal_perjalanan_lama, logs.jam_perjalanan_lama, logs.suhu_tubuh_lama, logs.deskripsi_lama, logs.created_at, logs.updated_at)
                VALUES (
                    NEW.user_id,
                    'Menambahkan Catatan Baru',
                    NEW.nama_tempat,
                    NEW.alamat,
                    NEW.tanggal_perjalanan,
                    NEW.jam_perjalanan,
                    NEW.suhu_tubuh,
                    NEW.deskripsi,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    now(),
                    now()
                );
            END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER add_catatan');
    }
};
