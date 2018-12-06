<?php

namespace App\Http\Controllers\Admin;

use App\Ecole;
use App\Faculte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FaculteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecoles = Ecole::orderBy('ecole_name', 'asc')->get();
        $facultes = Faculte::orderBy('faculte_name', 'asc')->get();

        return view('admin.facultes.index')->with(['ecoles' => $ecoles, 'facultes' => $facultes]);
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
            'faculte_name' => 'required',
            'ecole_id' => 'required',
        ]);

        if ($request->ajax()) {
            Faculte::create([
                'faculte_name' => $request->input('faculte_name'),
                'ecole_id' => $request->input('ecole_id'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'New Faculty successfully created!',
            ]);
        }

        Faculte::create([
            'faculte_name' => $request->input('faculte_name'),
            'ecole_id' => $request->input('ecole_id'),
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
            $faculte = Faculte::findOrfail($id);

            return response()->json(['status' => 'success', 'data' => $faculte]);
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
            'faculte_name' => 'required',
            'ecole_id' => 'required',
        ]);

        $faculte = Faculte::findOrfail($request->input('id'));

        if ($request->ajax()) {
            $faculte->update([
                'faculte_name' => $request->input('faculte_name'),
                'ecole_id' => $request->input('ecole_id'),
            ]);

            Log::info(Auth::user()->getFullName().' has updated '.$faculte->faculte_name.' Faculty Details');

            return response()->json([
                'status' => 'success',
                'message' => 'Faculty successfully updated!',
            ]);
        }

        $faculte->update([
            'faculte_name' => $request->input('faculte_name'),
            'ecole_id' => $request->input('ecole_id'),
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
            $faculte = Faculte::findOrfail($id);

            $faculte->delete();

            Log::info(Auth::user()->getFullName().' has deleted a Faculty Details');

            return response()->json(['status' => 'success', 'message' => 'Faculty Information delete!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }

    public function faculteDepartment(Request $request, $id)
    {
        $faculte_department = Faculte::where('id', $id)->with('departments')->first();

        if ($request->ajax()) {
            return response()->json(['status' => 'success', 'data' => $faculte_department->departments]);
        }
    }
}
