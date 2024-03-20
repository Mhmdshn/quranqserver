<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $datasetPath = __DIR__ . '/datasetfaker.json';
        $dataset = json_decode(file_get_contents($datasetPath), true);


        foreach (range(1, 25) as $index) {
            $gender = $faker->randomElement(['male', 'female']);
            $dob = $faker->date($format = 'Y-m-d', $max = '2000-01-01');
            $address = $faker->address;
            $island = $faker->word; // You can customize this based on your needs
            $country = $faker->country;

            $randomEntry = $faker->randomElement($dataset);

            // Generate a unique ID (assuming you want to start with "AXXXXXX001" and increment)
            $nid = 'A' . $faker->randomNumber(6);
            $phone = $faker->randomElement([77, 94]) . $faker->randomNumber(5, true);

            DB::table('users')->insert([
                'uuid'      => Str::uuid(),
                'email'     => $faker->safeEmail(),
                'password'  => $faker->password,
                'nid'       => $randomEntry['nid'],
                'name'      => $randomEntry['name_dhi'],
                'gender'    => $randomEntry['gender'],
                'dob'       => $dob,
                'phone'     => $phone,
                'currentisland'   => $randomEntry['island_dhi'],
                'currentaddress'   => $randomEntry['address_dhi'],
                'registeredisland'   => $randomEntry['island_dhi'],
                'registeredaddress'    => $randomEntry['address_dhi'],
                'country'   => "Maldives",
                'useridcopy'   => "useridlink",
                'role'      => $faker->randomElement(['free', 'paid']),
                'created_at' => now()
            ]);
            // Add more users as needed
        }
    }
}
