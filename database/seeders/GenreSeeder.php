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
        DB::statement("INSERT INTO genres (id, name, created_at, updated_at)
        VALUES (1,'アクション', NOW(), NOW()),
               (2,'ホラー', NOW(), NOW()),
               (3,'SF', NOW(), NOW()),
               (4,'ドキュメンタリー', NOW(), NOW()),
               (5,'ロマンス', NOW(), NOW());");
    }
}
