<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user12345'),
        ]);

        \App\Models\Category::factory()->create([
            'name'      => 'Laptop',
            'photo'     => 'laptop.jpg',
            'status'    => '',
            'remark'    => '',
        ]);

        \App\Models\Category::factory()->create([
            'name'      => 'Phone',
            'photo'     => 'Phone.jpg',
            'status'    => '',
            'remark'    => '',
        ]);

        \App\Models\Category::factory()->create([
            'name'      => 'Mouse',
            'photo'     => 'mouse.jpg',
            'status'    => '',
            'remark'    => '',
        ]);

        \App\Models\Category::factory()->create([
            'name'      => 'Chair',
            'photo'     => 'chair.jpg',
            'status'    => '',
            'remark'    => '',
        ]);

        \App\Models\Category::factory()->create([
            'name'      => 'Smart TV',
            'photo'     => 'smarttv.jpg',
        ]);

        // For Brand
        \App\Models\Brand::factory()->create([
            'category_id'   => '1',
            'name'          => 'Apple',
            'photo'         => 'apple.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

        \App\Models\Brand::factory()->create([
            'category_id'   => '1',
            'name'          => 'Dell',
            'photo'         => 'dell.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

        \App\Models\Brand::factory()->create([
            'category_id'   => '2',
            'name'          => 'Apple',
            'photo'         => 'iphone.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

        \App\Models\Brand::factory()->create([
            'category_id'   => '2',
            'name'          => 'Samsung',
            'photo'         => 'samsung.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

        \App\Models\Brand::factory()->create([
            'category_id'   => '3',
            'name'          => 'Logitech',
            'photo'         => 'logitech.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

        \App\Models\Brand::factory()->create([
            'category_id'   => '3',
            'name'          => 'Razer',
            'photo'         => 'razer.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Brand::factory()->create([
            'category_id'   => '4',
            'name'          => 'Secretlab',
            'photo'         => 'secretlab.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Brand::factory()->create([
            'category_id'   => '4',
            'name'          => 'Anda Seat',
            'photo'         => 'anda-seat.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Brand::factory()->create([
            'category_id'   => '5',
            'name'          => 'LG',
            'photo'         => 'lg.jpg',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Brand::factory()->create([
            'category_id'   => '5',
            'name'          => 'Samsung',
            'photo'         => 'samsung-tv.jpg',
            'status'        => '',
            'remark'        => ''
         ]);
        // For Brand

        // For Product

        \App\Models\Product::factory()->create([
            'category_id'   => '1',
            'brand_id'      => '1',
            'name'          => 'MacBook Air M4',
            'photo1'        => 'macbook air m4-1.jpg',
            'photo2'        => 'macbook air m4-2.jpg',
            'photo3'        => 'macbook air m4-3.jpg',
            'photo4'        => 'macbook air m4-4.jpg',
            'price'         => '1200',
            'qty'           => '38',
            'status'        => '',
            'remark'        => ''
         ]);

        \App\Models\Product::factory()->create([
            'category_id'   => '1',
            'brand_id'      => '2',
            'name'          => 'XPS 13',
            'photo1'        => 'xps 13-1.jpg',
            'photo2'        => 'xps 13-2.jpg',
            'photo3'        => 'xps 13-3.jpg',
            'photo4'        => 'xps 13-4.jpg',
            'price'         => '1399',
            'qty'           => '24',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '2',
            'brand_id'      => '3',
            'name'          => 'Galaxy S25 Ultra',
            'photo1'        => 'galaxy s25 ultra-1.jpg',
            'photo2'        => 'galaxy s25 ultra-2.jpg',
            'photo3'        => 'galaxy s25 ultra-3.jpg',
            'photo4'        => 'galaxy s25 ultra-4.jpg',
            'price'         => '1299',
            'qty'           => '30',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '2',
            'brand_id'      => '4',
            'name'          => 'iPhone 16 Pro Max',
            'photo1'        => 'iphone 16 pro max-1.jpg',
            'photo2'        => 'iphone 16 pro max-2.jpg',
            'photo3'        => 'iphone 16 pro max-3.jpg',
            'photo4'        => 'iphone 16 pro max-4.jpg',
            'price'         => '1199',
            'qty'           => '26',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '3',
            'brand_id'      => '5',
            'name'          => 'MX Master 3S',
            'photo1'        => 'mx master 3s-1.jpg',
            'photo2'        => 'mx master 3s-2.jpg',
            'photo3'        => 'mx master 3s-3.jpg',
            'photo4'        => 'mx master 3s-4.jpg',
            'price'         => '119.99',
            'qty'           => '100',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '3',
            'brand_id'      => '6',
            'name'          => 'DeathAdder V2',
            'photo1'        => 'deathadder v2-1.jpg',
            'photo2'        => 'deathadder v2-2.jpg',
            'photo3'        => 'deathadder v2-3.jpg',
            'photo4'        => 'deathadder v2-4.jpg',
            'price'         => '59.99',
            'qty'           => '93',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '4',
            'brand_id'      => '7',
            'name'          => 'Secretlab Titan Evo 2025',
            'photo1'        => 'chair-1.jpg',
            'photo2'        => 'chair-2.jpg',
            'photo3'        => 'chair-3.jpg',
            'photo4'        => 'chair-4.jpg',
            'price'         => '639',
            'qty'           => '80',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '4',
            'brand_id'      => '8',
            'name'          => 'Kaiser 3 Gaming Chair',
            'photo1'        => 'gaming chair-1.jpg',
            'photo2'        => 'gaming chair-2.jpg',
            'photo3'        => 'gaming chair-3.jpg',
            'photo4'        => 'gaming chair-4.jpg',
            'price'         => '489',
            'qty'           => '40',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '5',
            'brand_id'      => '9',
            'name'          => 'LG OlED C3 55" ',
            'photo1'        => 'lg-1.jpg',
            'photo2'        => 'lg-2.jpg',
            'photo3'        => 'lg-3.jpg',
            'photo4'        => 'lg-4.jpg',
            'price'         => '1499.95',
            'qty'           => '21',
            'status'        => '',
            'remark'        => ''
         ]);

         \App\Models\Product::factory()->create([
            'category_id'   => '5',
            'brand_id'      => '10',
            'name'          => 'Samsung QLED Q80C 65" ',
            'photo1'        => '65-1.jpg',
            'photo2'        => '65-2.jpg',
            'photo3'        => '65-3.jpg',
            'photo4'        => '65-4.jpg',
            'price'         => '1197.99',
            'qty'           => '38',
            'status'        => '',
            'remark'        => ''
         ]);

         // For Product
    }
}
