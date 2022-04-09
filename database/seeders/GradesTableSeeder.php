<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Grade;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::truncate();

        Grade::Create([
            'student_id'        => 1,
            'assignment_id'     => 1,
            'score'             => 4.2
        ]);

        Grade::Create([
            'student_id'        => 1,
            'assignment_id'     => 2,
            'score'             => 4.8
        ]);

        Grade::Create([
            'student_id'        => 2,
            'assignment_id'     => 1,
            'score'             => 3.6
        ]);

        Grade::Create([
            'student_id'        => 2,
            'assignment_id'     => 2,
            'score'             => 4.4
        ]);
    }
}
