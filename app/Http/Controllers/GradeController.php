<?php
namespace App\Http\Controllers;

use App\Http\Grades;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grade = Grades::all();
        return view("grade-index", [
            'grades' => $grade
        ]);
    }

    public function submit(Request $request)
    {
        Grades::query()->create([
            'nim' => $request->nim,
            'quiz_score' => $request->quiz_score,
            'task_score' => $request->task_score,
            'absent_score' => $request->absent_score,
            'practice_score' => $request->practice_score,
            'uas_score' => $request->uas_score
        ]);

        return redirect()->back();
    }
}
