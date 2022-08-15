<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::unprepared('CREATE OR REPLACE FUNCTION count_likes_trigger_function()
        RETURNS TRIGGER
        AS $$
        BEGIN
            UPDATE posts
            SET likes = (SELECT count(*) FROM likes WHERE post_id = NEW.post_id)
            WHERE id = NEW.post_id;
            RETURN NEW;
        END;
        $$ LANGUAGE PLPGSQL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS count_likes_trigger_function();');
    }
};
