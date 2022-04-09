<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Student;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();

        $faker = Faker::create();
    	foreach (range(1,50) as $index) {
            Student::Create([
                'first_name' => $faker->firstname,
                'last_name' => $faker->lastname,
                'email' => $faker->email,
                'birthday' => $faker->date($format = 'Y-m-d')
            ]);
        }
    }
}
