<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserInfoSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $userinfo = [];

        for ($i=0; $i < 50; $i++) {
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);

            $userinfo[] = [
                'name'      => $faker->firstName,
                'lastname'  => $faker->lastName,
                'birthday'  => $faker->date(),
                'gender'    => $faker->randomElement(['Male', 'Female']),
                'phone'     => $faker->phoneNumber,
                'bio'       => $faker->sentence(5),
                'website'   => $faker->url,
                'created_at'    => $created_at->format('Y-m-d H:i:s'),
                'updated_at'    => $updated_at->format('Y-m-d H:i:s'),
                'deleted_at'    => $deleted_at->format('Y-m-d H:i:s')
            ];
        }

        $builder = $this->db->table('userinfo');
        $builder->insertBatch($userinfo);
    }
}