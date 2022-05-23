<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class TitlesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('teachers.titles.form', [
            'action' => 'Nuevo',
            'model' => false,
            'title' => []
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
        $this->saveTitle($request);

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
        return response()->view('teachers.titles.form', [
            'action' => 'Editar',
            'model' => true,
            'title' => Title::find($id)
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
        $this->saveTitle($request);

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
            $this->deleteTitle($request->id);

            return response()->redirectTo(route('teachers.dashboard'));
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    private function saveTitle(Request $request): void
    {
        $title = new Title();

        if (isset($request->id)) {
            $title = Title::find($request->id);
        }

        $title->name = $request->name;

        $title->save();
    }

    /**
     * @param string $id
     * @return void
     * @throws Exception
     */
    private function deleteTitle(string $id): void
    {
        try {
            $title = Title::findOrFail($id);

            $title->delete();
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
