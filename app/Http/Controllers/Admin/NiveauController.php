<?php

namespace App\Http\Controllers\Admin;

use App\Niveau;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('department_name', 'asc')->get();
        $niveaux = Niveau::orderBy('niveau_name', 'asc')->get();

        return view('admin.niveau.index')->with(['departments' => $departments, 'niveaux' => $niveaux]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'niveau_name' => 'required',
            'department_id' => 'required',
        ]);

        if ($request->ajax()) {
            Niveau::create([
                'niveau_name' => $request->input('niveau_name'),
                'department_id' => $request->input('department_id'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'New Niveau successfully created!',
            ]);
        }

        Niveau::create([
            'niveau_name' => $request->input('niveau_name'),
            'department_id' => $request->input('department_id'),
        ]);

        Log::info(Auth::user()->getFullName().' has created a new Niveau ');

        return redirect()->back()->with('message', 'New Niveau successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // get a single Niveau
            $niveau = Niveau::findOrfail($id);

            return response()->json(['status' => 'success', 'data' => $niveau]);
            // return the single Niveau
            // return new NiveauResource($Niveau);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something is broken contact admin']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'niveau_name' => 'required',
            'department_id' => 'required',
        ]);

        $niveau = Niveau::findOrfail($request->input('id'));

        if ($request->ajax()) {
            $department->update([
                'niveau_name' => $request->input('niveau_name'),
                'department_id' => $request->input('department_id'),
            ]);

            Log::info(Auth::user()->getFullName().' has updated '.$department->niveau_name.' Niveau Details');

            return response()->json([
                'status' => 'success',
                'message' => 'Niveau successfully updated!',
            ]);
        }

        $niveau->update([
            'niveau_name' => $request->input('niveau_name'),
            'department_id' => $request->input('department_id'),
        ]);

        return redirect()->back()->with('message', 'Niveau successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $niveau = Niveau::findOrfail($id);

            $niveau->delete();

            Log::info(Auth::user()->getFullName().' has deleted a Niveau Details');

            return response()->json(['status' => 'success', 'message' => 'Niveau Information delete!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }

    public function niveauFilieres(Request $request, $id)
    {
        $niveauFilieres = Niveau::where('id', $id)->with('filieres')->first();

        //return  TeamResource::collection($depart_teams->teams);

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'data' => $niveauFilieres->filieres]);
        }

        // return view('admin.departments.department-teams')->with('department', $depart_teams);
    }
}
