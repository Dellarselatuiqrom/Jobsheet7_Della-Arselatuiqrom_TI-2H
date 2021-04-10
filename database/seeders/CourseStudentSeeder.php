<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courstud = [
            ['student_id' =>1941720001,
              'course_id' =>1,
              'value' => 'A',
            ],
            ['student_id' =>1941720002,
              'course_id' =>2,
              'value' => 'A',
            ],
        ];

        DB::table('course_student')->insert($courstud);
    }
}
