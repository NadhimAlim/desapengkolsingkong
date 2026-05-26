<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@pengkol.test'], [
            'name' => 'Admin UMKM',
            'password' => 'password',
            'is_admin' => true,
        ]);

        Product::updateOrCreate(['slug' => 'keripik-singkong-original'], [
            'name' => 'Keripik Singkong Original',
            'category' => 'Keripik',
            'price' => 12000,
            'stock' => 45,
            'description' => 'Keripik singkong gurih dengan tekstur renyah, cocok untuk camilan keluarga dan oleh-oleh.',
            'is_featured' => true,
            'is_published' => true,
        ]);

        Product::updateOrCreate(['slug' => 'keripik-singkong-balado'], [
            'name' => 'Keripik Singkong Balado',
            'category' => 'Keripik',
            'price' => 14000,
            'stock' => 32,
            'description' => 'Perpaduan singkong pilihan dengan bumbu balado pedas manis yang meresap.',
            'is_featured' => true,
            'is_published' => true,
        ]);

        Product::updateOrCreate(['slug' => 'kerupuk-singkong'], [
            'name' => 'Kerupuk Singkong',
            'category' => 'Kerupuk',
            'price' => 10000,
            'stock' => 60,
            'description' => 'Kerupuk singkong ringan yang cocok menjadi pelengkap makan atau camilan harian.',
            'is_featured' => true,
            'is_published' => true,
        ]);

        Article::updateOrCreate(['slug' => 'potensi-singkong-desa-pengkol-untuk-produk-bernilai-jual'], [
            'title' => 'Potensi Singkong Desa Pengkol untuk Produk Bernilai Jual',
            'excerpt' => 'Singkong dapat dikembangkan menjadi berbagai produk camilan yang dekat dengan kebutuhan pasar.',
            'content' => "Singkong merupakan salah satu bahan pangan lokal yang mudah ditemukan dan dapat diolah menjadi produk bernilai jual.\n\nMelalui program PPKO, potensi ini dikembangkan dengan pendekatan digital agar produk UMKM Desa Pengkol lebih mudah dikenal masyarakat luas.",
            'is_published' => true,
            'published_at' => now(),
        ]);

        Article::updateOrCreate(['slug' => 'pentingnya-kemasan-dan-katalog-digital-bagi-umkm'], [
            'title' => 'Pentingnya Kemasan dan Katalog Digital bagi UMKM',
            'excerpt' => 'Tampilan produk yang rapi membantu calon pembeli memahami kualitas dan nilai produk lokal.',
            'content' => "Katalog digital membantu pelaku UMKM menampilkan informasi produk secara jelas, mulai dari foto, harga, stok, hingga deskripsi.\n\nDengan dashboard admin, pengelola dapat memperbarui informasi kapan saja tanpa harus mengubah kode program.",
            'is_published' => true,
            'published_at' => now()->subDay(),
        ]);
    }
}
