<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PhongChieuSeeder;
use Database\Seeders\PhimSeeder;
use Database\Seeders\SuatChieuSeeder;
use Database\Seeders\VeSeeder;
use Database\Seeders\VoucherSeeder;
use Database\Seeders\DonHangSeeder;
use Database\Seeders\BinhLuanSeeder;
use Database\Seeders\DanhGiaSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {



        $this->call([
            PhongChieuSeeder::class,
            PhimSeeder::class,
            SuatChieuSeeder::class,
            VeSeeder::class,
            VoucherSeeder::class,
            DonHangSeeder::class,
            BinhLuanSeeder::class,
            DanhGiaSeeder::class,
        ]);
    }
}
