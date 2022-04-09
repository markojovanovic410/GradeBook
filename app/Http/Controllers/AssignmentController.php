<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Grade;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all()->toArray();
        return response()->json($assignments);
    }

    public function store(Request $request)
    {
        $assignment = new Assignment([
            'name' => $request->input('name'),
            'time' => $request->input('time'),
        ]);
        $assignment->save();
        return response()->json('Assignment created!');
    }

    public function show($id)
    {
        $assignment = Assignment::find($id);
        return response()->json($assignment);
    }

    public function grade($id)
    {
        $assignment = Assignment::find($id);
        $grades = Grade::with('student')
            ->where('assignment_id', $id)
            ->get();
        return response()->json([
            'assignment' => $assignment,
            'grades' => $grades,
        ]);
    }

    public function update($id, Request $request)
    {
        $assignment = Assignment::find($id);
        $assignment->update($request->all());
        return response()->json('Assignment updated!');
    }

    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();
        return response()->json('Assignment deleted!');
    }
}
