<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $datasetPath = __DIR__ . '/datasetfaker.json';
        $dataset = json_decode(file_get_contents($datasetPath), true);

        $usedUserIds = [];

        foreach (range(1, 25) as $index) {
            $user = User::whereNotIn('id', $usedUserIds)->inRandomOrder()->first();
            $randomEntry = $faker->randomElement($dataset);

            if ($user) {
                $usedUserIds[] = $user->id;

                DB::table('posts')->insert([
                    'userId'    => $user->id,
                    'nickname'  => $randomEntry['name_dhi'],
                    'gender'    => $randomEntry['gender'],
                    'age'       => $faker->numberBetween(18,45),
                    'aboutme'       => "ދީންވެރި ހެޔޮލަފާ އަޚްލާޤު ރަނގަޅު އަދި ތެދުވެރި ކުއްޖެއް. ފަސްނަމާދުކުރާ ކުއްޖެއް",
                    'livingIn'  => $randomEntry['island_dhi'],
                    'isPublic'  => 1,
                    'created_at' => now()
                ]);
            } else {
                // Handle the case where there are not enough unique users
                break;
            }
        }
    }
}
