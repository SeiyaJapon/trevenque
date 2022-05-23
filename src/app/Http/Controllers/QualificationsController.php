<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QualificationsController extends Controller
{
    public function index(Request $request)
    {
        $students = (new User())->getUserWithCoursesQualifications();

        return response()->view('teachers.qualifications.dashboard', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $this->saveQualification($request);

        return response()->redirectTo(route('teachers.dashboard'));
    }

    /**
     * @param Request $request
     * @return void
     */
    private function saveQualification(Request $request): void
    {
        foreach ($request->note as $key => $value) {
            $qualification = $this->getQualificationifExistsOrNew($request, $key);

            $qualification->course_id = $request->course_id[$key];
            $qualification->user_id = $request->user_id[$key];
            $qualification->year = Carbon::now();
            $qualification->note = $request->note[$key];
            $qualification->tries = $request->tries[$key];

            $qualification->save();
        }
    }

    private function getQualificationifExistsOrNew(Request $request, int|string $key)
    {
        return Qualification::where('course_id', $request->course_id[$key])
                            ->where('user_id', $request->user_id[$key])
                            ->orderByDesc('year')
                            ->first() ?? new Qualification();
    }
}
