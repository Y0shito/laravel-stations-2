<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO genres (name, created_at, updated_at)
        VALUES ('アクション', NOW(), NOW()),
               ('ホラー', NOW(), NOW()),
               ('SF', NOW(), NOW()),
               ('ドキュメンタリー', NOW(), NOW()),
               ('ロマンス', NOW(), NOW());");
    }
}
