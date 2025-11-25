<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ves = [];

        // Xóa dữ liệu cũ trước khi chèn mới
        DB::table('ves')->truncate();
        DB::table('ves')->delete();
        DB::table('ves')->insert($ves);
    }
}
