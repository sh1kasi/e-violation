<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Pelanggaran Ringan', 
                'start' => 10, 
                'end' => 35, 
                'follow_up' => 'Peringatan ke I (Petugas Ketertiban)',
            ],
            [
                'name' => 'Pelanggaran Ringan', 
                'start' => 36, 
                'end' => 55, 
                'follow_up' => 'Peringatan ke II (Koord. Ketertiban)',
            ],
            [
                'name' => 'Pelanggaran Sedang', 
                'start' => 56, 
                'end' => 75, 
                'follow_up' => 'Panggilan Orang tua ke I (Tatib, BK, Wali Kelas)',
            ],
            [
                'name' => 'Pelanggaran Sedang', 
                'start' => 76, 
                'end' => 95, 
                'follow_up' => 'Panggilan Orang tua ke II (Tatib, BK, Wali Kelas)',
            ],
            [
                'name' => 'Pelanggaran Sedang', 
                'start' => 96, 
                'end' => 149, 
                'follow_up' => 'Panggilan Orang tua ke III (KoordBK)',
            ],
            [
                'name' => 'Pelanggaran Berat', 
                'start' => 150, 
                'end' => 249, 
                'follow_up' => 'Skorsing (Wakasek Kesiswaan)',
            ],
            [
                'name' => 'Pelanggaran Sedang', 
                'start' => 250, 
                'end' => 1000, 
                'follow_up' => 'Dikembalikan ke orang tua (Kepala Sekolah)',
            ],
        ];

        foreach ($categories as $value) {
            Category::create($value);   
        }
    }
}
