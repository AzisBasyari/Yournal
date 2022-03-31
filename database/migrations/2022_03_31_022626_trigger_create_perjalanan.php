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
                INSERT INTO logs (logs.user_id, logs.catatan_id, logs.aktivitas, logs.created_at, logs.updated_at)
                VALUES (
                    NEW.user_id,
                    NEW.id,
                    'Menambahkan Catatan Baru',
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
