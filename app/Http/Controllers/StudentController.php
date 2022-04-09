<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Student;
use App\Models\Grade;
use DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $cnt = 10;
        if ($request->has('page_count')) {
            $cnt = $request->get('page_count');
        }
        $students = Student::paginate($cnt);
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $student = new Student([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
        ]);
        $student->save();
        return response()->json('Student created!');
    }

    public function show($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function grade($id)
    {
        $student = Student::find($id);
        $assignments = Assignment::select(
            'assignments.id',
            'assignments.name',
            'assignments.time',
            DB::raw('IF(ISNULL(grades.score),"",grades.score) as score')
        )
            ->leftJoin('grades', function ($join) use ($id) {
                $join->on('assignments.id', '=', 'grades.assignment_id');
                $join->where('grades.student_id', $id);
            })
            ->get();
        return response()->json([
            'student' => $student,
            'assignments' => $assignments,
        ]);
    }

    public function update($id, Request $request)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return response()->json('Student updated!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json('Student deleted!');
    }

    public function updateScore(Request $request)
    {
        Grade::updateOrCreate(['student_id' => $request->student_id, 'assignment_id' => $request->assignment_id], ['score' => $request->score]);
        return response()->json('Score updated!');

    }
}
