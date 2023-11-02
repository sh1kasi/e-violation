<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major =[
            ['name' => 'Rekayasa Perangkat Lunak', 'short_name' => 'rpl'],
            ['name' => 'Desain Komunikasi Visual', 'short_name' => 'dkv'],
            ['name' => 'Perhotelan', 'short_name' => 'ph'],
            ['name' => 'Otomasi Tata Kelola Perkantoran', 'short_name' => 'rpl'],
            ['name' => 'Akuntansi dan Keuangan Lembaga', 'short_name' => 'akl'],
            ['name' => 'MultiMedia', 'short_name' => 'mm'],
        ];

        foreach ($major as $value) {
            Major::create($value);
        }
    }
}
