<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama' => 'Xiomi Note 7 Pro',
            'deskripsi' => 'HP Bagus Harga Murah',
            'Merk' => 'Xiomi',
            'kategori' => 'Android',
            'harga' => 3000000,
            'stok' => 89,
            'gambar' => 'https://p-id.ipricegroup.com/uploaded_04349d11e4a7919072d1012d92d4dc9a.jpg'
            ]
    );

// ,
//             [
//                 'nama' => 'Xiomi Note 8 Pro',
//                 'deskripsi' => 'HP Bagus Harga Murah',
//                 'Merk' => 'Xiomi',
//                 'kategori' => 'Android',
//                 'harga' => 3500000,
//                 'gambar' => 'http://p-id.ipricegroup.com/uploaded_b77ec1529e8321c55daa45696ac87deb.jpg'
//             ],
//             [
//                 'nama' => 'Xiomi Note 9 Pro',
//                 'deskripsi' => 'HP Bagus Harga Murah',
//                 'Merk' => 'Xiomi',
//                 'kategori' => 'Android',
//                 'harga' => 4000000,
//                 'gambar' => 'http://p-id.ipricegroup.com/uploaded_b2d8409a0b93f078c1943fe99303655c.jpg'
//             ],
//             [
//                 'nama' => 'Realme Narzo 20 Pro',
//                 'deskripsi' => 'HP Bagus Harga Murah',
//                 'Merk' => 'Realme',
//                 'kategori' => 'Android',
//                 'harga' => 3000000,
//                 'gambar' => 'http://p-id.ipricegroup.com/uploaded_5132f6f246b7efd83f6ed8f366a2c87d.jpg'
//             ],
//             [
//                 'nama' => 'Iphone 13 Pro Max',
//                 'deskripsi' => 'HP Bagus Harga Murah',
//                 'Merk' => 'Iphone',
//                 'kategori' => 'IOS',
//                 'harga' => 23000000,
//                 'gambar' => 'https://cdn.eraspace.com/pub/media/catalog/product/i/p/iphone_13_pro_max_silver_1.jpg'
//             ],
//             [
//                 'nama' => 'Iphone XR',
//                 'deskripsi' => 'HP Bagus Harga Murah',
//                 'Merk' => 'Iphone',
//                 'kategori' => 'IOS',
//                 'harga' => 6000000,
//                 'gambar' => 'https://cdn.eraspace.com/pub/media/catalog/product/i/p/iphone-xr-white_1_6_1_3.jpg'
//             ]


    }
}
