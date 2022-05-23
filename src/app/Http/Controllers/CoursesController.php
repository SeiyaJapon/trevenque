<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Title;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CoursesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = [];

        foreach (Title::all() as $title) {
            $titles[$title->id] = $title->name;
        }

        return response()->view('teachers.courses.form', [
            'action' => 'Nuevo',
            'model' => false,
            'course' => [],
            'year' => [],
            'titles' => $titles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $this->saveCourse($request);

        return redirect(route('teachers.dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        $titles = [];

        foreach (Title::all() as $title) {
            $titles[$title->id] = $title->name;
        }

        $year = Carbon::createFromDate($course->year);

        return response()->view('teachers.courses.form', [
            'action' => 'Nuevo',
            'model' => true,
            'course' => Course::find($id),
            'year' => $year->format('Y-m-d'),
            'titles' => $titles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $this->saveCourse($request);

        return redirect(route('teachers.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        try
        {
            $this->deleteCourse($request->id);

            return response()->redirectTo(route('teachers.dashboard'));
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    private function saveCourse(Request $request): void
    {
        $courses = new Course();

        if (isset($request->id)) {
            $courses = Course::find($request->id);
        }

        $courses->name = $request->name;
        $courses->title_id = $request->title_id;
        $courses->credits = $request->credits;
        $courses->max_students = $request->max_students;
        $courses->year = $request->year;

        $courses->save();
    }

    /**
     * @param string $id
     * @return void
     * @throws Exception
     */
    private function deleteCourse(string $id): void
    {
        try {
            $courses = Course::findOrFail($id);

            $courses->delete();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
