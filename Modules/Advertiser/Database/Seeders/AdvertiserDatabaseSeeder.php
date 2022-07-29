<?php

namespace Modules\Advertiser\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Advertiser\Entities\Advertiser;


class AdvertiserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => "user0$i",
                'email' => "user0$i@gmail.com",
                'password' => Hash::make('12345678'),
            ];

        }

        Advertiser::insert($data);


    }
}
