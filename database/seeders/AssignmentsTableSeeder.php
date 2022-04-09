<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Assignment;

class AssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assignment::truncate();

        Assignment::Create([
            'name'    => 'Math',
            'time'     => '2022-04-07 09:00:00',
        ]);

        Assignment::Create([
            'name'    => 'English',
            'time'     => '2022-04-08 15:00:00',
        ]);

        Assignment::Create([
            'name'    => 'Computer',
            'time'     => '2022-04-12 15:00:00',
        ]);

        Assignment::Create([
            'name'    => 'Economics',
            'time'     => '2022-04-14 10:00:00',
        ]);
    }
}
