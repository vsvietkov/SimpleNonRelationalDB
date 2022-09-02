<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Problem;
use App\Models\Statistic;
use Faker\Generator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $testData = json_decode(file_get_contents(__DIR__ . '/../../tests/testData.json'), true);
        $faker    = new Generator();

        foreach ($testData['data'] as $data) {
            $problem = Problem::create($data);

            $answer  = Answer::create(['description' => 'Pull the level', 'problem_id' => $problem['id']]);
            Statistic::create(['answer_id' => $answer['id'], 'count' => $faker->randomNumber(3)]);

            $answer  = Answer::create(['description' => 'Do nothing', 'problem_id' => $problem['id']]);
            Statistic::create(['answer_id' => $answer['id'], 'count' => $faker->randomNumber(3)]);
        }
    }
}
