<?php

namespace App\Http\Controllers\Admin;

use App\Faculte;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('department_name', 'asc')->get();
        $facultes = Faculte::orderBy('faculte_name', 'asc')->get();

        return view('admin.department.index')->with(['departments' => $departments, 'facultes' => $facultes]);
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
            'department_name' => 'required',
            'faculte_id' => 'required',
        ]);

        if ($request->ajax()) {
            Department::create([
                'department_name' => $request->input('department_name'),
                'faculte_id' => $request->input('faculte_id'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'New Faculty successfully created!',
            ]);
        }

        Department::create([
            'department_name' => $request->input('department_name'),
            'faculte_id' => $request->input('faculte_id'),
        ]);

        Log::info(Auth::user()->getFullName().' has created a new Faculty ');

        return redirect()->back()->with('message', 'New Faculty successfully created!');
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
            // get a single Faculty
            $department = Department::findOrfail($id);

            return response()->json(['status' => 'success', 'data' => $department]);
            // return the single Faculty
            // return new FacultyResource($Faculty);
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
            'department_name' => 'required',
            'faculte_id' => 'required',
        ]);

        $department = Department::findOrfail($request->input('id'));

        if ($request->ajax()) {
            $department->update([
                'department_name' => $request->input('department_name'),
                'faculte_id' => $request->input('faculte_id'),
            ]);

            Log::info(Auth::user()->getFullName().' has updated '.$department->department_name.' Faculty Details');

            return response()->json([
                'status' => 'success',
                'message' => 'Faculty successfully updated!',
            ]);
        }

        $department->update([
            'department_name' => $request->input('department_name'),
            'faculte_id' => $request->input('faculte_id'),
        ]);

        return redirect()->back()->with('message', 'Faculty successfully Updated!');
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
            $department = Department::findOrfail($id);

            $department->delete();

            Log::info(Auth::user()->getFullName().' has deleted a Deparment Details');

            return response()->json(['status' => 'success', 'message' => 'Deparment Information delete!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }

    public function departmentNiveau(Request $request, $id)
    {
        $departmentNiveau = Department::where('id', $id)->with('niveaux')->first();

        //return  TeamResource::collection($depart_teams->teams);

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'data' => $departmentNiveau->niveaux]);
        }

        // return view('admin.departments.department-teams')->with('department', $depart_teams);
    }
}
