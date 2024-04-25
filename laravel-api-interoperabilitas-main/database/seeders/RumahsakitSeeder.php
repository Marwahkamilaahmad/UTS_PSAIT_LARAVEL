<?php

namespace Database\Seeders;

use App\Models\Rumahsakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahsakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Rumahsakit::create([
            'nama_rs' => 'RS Harapan Baru',
            'alamat_rs' => 'Jl. Harapan No. 123',
            'jumlah_dokter' => 15,
            'tanggal_berdiri' => '1990-06-15',
        ]);

        Rumahsakit::create([
            'nama_rs' => 'RS Sentosa',
            'alamat_rs' => 'Jl. Sentosa No. 456',
            'jumlah_dokter' => 20,
            'tanggal_berdiri' => '1985-10-20',
        ]);
        Rumahsakit::create([
            'nama_rs' => 'RS Jeruk Purut',
            'alamat_rs' => 'Jl. Harapan No. 243',
            'jumlah_dokter' => 17,
            'tanggal_berdiri' => '1990-06-15',
        ]);

        Rumahsakit::create([
            'nama_rs' => 'RS Smile Hospital',
            'alamat_rs' => 'Jl. Sentosa No. 900',
            'jumlah_dokter' => 43,
            'tanggal_berdiri' => '1985-10-20',
        ]);
    }
}
