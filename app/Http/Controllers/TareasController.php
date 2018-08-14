<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tareas;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tarea = Tareas::orderBy('id', 'DESC')->paginate(2);

        return [
          'pagination' => [
            'total' => $tarea->total(),
            'current_page' => $tarea->currentPage(),
            'per_page' => $tarea->perPage(),
            'last_page' => $tarea->lastPage(),
            'from' => $tarea->firstItem(),
            'to' => $tarea->lastItem(),
          ],
          'tareas' => $tarea
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'keep' => 'required',
        ]);

        Tareas::create($request->all());

        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'keep' => 'required',
        ]);

        Tareas::find($id)->update($request->all());

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea =  Tareas::findOrFail($id);
        $tarea->delete();
    }
}
