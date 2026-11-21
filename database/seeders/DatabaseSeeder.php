<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Buku\Models\Buku;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'name' => 'Anggota Perpustakaan',
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $buku = [
            ['judul' => 'Laravel: Panduan Praktis', 'penulis' => 'Budi Santoso', 'penerbit' => 'Informatika', 'tahun_terbit' => 2023, 'stok' => 5],
            ['judul' => 'Basis Data Relasional', 'penulis' => 'Siti Rahmawati', 'penerbit' => 'Andi Offset', 'tahun_terbit' => 2021, 'stok' => 3],
            ['judul' => 'Algoritma dan Pemrograman', 'penulis' => 'Rinaldi Munir', 'penerbit' => 'Informatika', 'tahun_terbit' => 2020, 'stok' => 7],
            ['judul' => 'Jaringan Komputer', 'penulis' => 'Dedi Kurniawan', 'penerbit' => 'Graha Ilmu', 'tahun_terbit' => 2019, 'stok' => 2],
            ['judul' => 'Rekayasa Perangkat Lunak', 'penulis' => 'Ani Lestari', 'penerbit' => 'Erlangga', 'tahun_terbit' => 2022, 'stok' => 4],
        ];

        foreach ($buku as $item) {
            Buku::create($item);
        }
    }
}
