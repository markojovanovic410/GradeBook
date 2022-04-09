<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Assignment;
use App\Models\Grade;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCnt = Student::count();
        $assignmentCnt = Assignment::count();
        $grades = Grade::select('student_id', DB::raw('SUM(score) as sum_score'), DB::raw('COUNT(score) as cnt_score'))->groupBy('student_id')->with('student')->get();
        return response()->json(array("student_cnt" => $studentCnt, "assignment_cnt" => $assignmentCnt, "grades" => $grades));
    }
}
