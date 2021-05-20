<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'name' => 'Admin',
                'password' =>Hash::make('admin'),
                'role' => 'admin',
                'created_at' => now()

            ],[
                'username' => 'adi',
                'name' => 'Adi',
                'password' =>Hash::make('admin'),
                'role' =>'reseller',
                'created_at' => now()
            ]
        ]);
        DB::table('resellers')->insert([
            [
                'user_id' => 2,
                'role' => 'reseller',
                'name' => 'Adi',
                'gender' => 'L',
                'email' => 'adi@gmail.com',
                'birthday' => '1996/04/12',
                'address' => 'Maospati',
                'phone' => '081217739049',
                'created_at' => now()

            ]
        ]);
        DB::table('categories')->insert([
            [
               'category_name' => 'Softcotton',
               'category_code' => 'SF',
                'created_at' => now()

            ],
            [
                'category_name' => 'Bella Square',
                'category_code' => 'BL',
                'created_at' => now()
            ],
            [
                'category_name' => 'Aksesoris',
                'category_code' => 'Aks',
                'created_at' => now()
            ]
        ]);
        DB::table('products')->insert([
            [
               'product_category' => 'SF',
               'product_slug' => 'softcotton-basic-square',
               'product_code' => 'SF-Square',
               'product_name' => 'Softcotton Basic Square',
               'product_price' => '25000',
               'created_at' => now()
            ]
        ]);
    }
}
