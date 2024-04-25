<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Pasien::create([
            'nama_pasien' => 'John Doe',
            'umur' => 30,
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '1992-05-15',
            'alamat' => 'Jl. Contoh No. 123',
        ]);
        
        Pasien::create([
            'nama_pasien' => 'Jane Smith',
            'umur' => 25,
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => '1997-10-20',
            'alamat' => 'Jl. Contoh No. 456',
        ]);

        Pasien::create([
            'nama_pasien' => 'Joanah',
            'umur' => 21,
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => '1998-10-25',
            'alamat' => 'Jl. Contoh No. 496',
        ]);

        Pasien::create([
            'nama_pasien' => 'Jehan',
            'umur' => 18,
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2006-10-20',
            'alamat' => 'Jl. Contoh No. 223',
        ]);
    }
}
