<?php

namespace App\Http\Controllers\Admin;

use App\Ecole;
use App\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecoles = Ecole::orderBy('ecole_name', 'asc')->get();
        $publications = Publication::orderBy('publication_date', 'asc')->get();

        return view('admin.publications.index')->with(['ecoles' => $ecoles, 'publications' => $publications]);
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
            'ecole_name' => 'required',
            'ecole_type' => 'required',
            'ecole_representative' => 'required',
            'ecole_address' => 'required',
            'ecole_location' => 'required',
            'ecole_phone' => 'required',
        ]);

        if ($request->ajax()) {
            Ecole::create([
                'ecole_name' => $request->input('ecole_name'),
                'ecole_type' => $request->input('ecole_type'),
                'ecole_representative' => $request->input('ecole_representative'),
                'ecole_address' => $request->input('ecole_address'),
                'ecole_location' => $request->input('ecole_location'),
                'ecole_phone' => $request->input('ecole_phone'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'New School successfully created!',
            ]);
        }

        Ecole::create([
            'ecole_name' => $request->input('ecole_name'),
            'ecole_type' => $request->input('ecole_type'),
            'ecole_representative' => $request->input('ecole_representative'),
            'ecole_address' => $request->input('ecole_address'),
            'ecole_location' => $request->input('ecole_location'),
            'ecole_phone' => $request->input('ecole_phone'),
        ]);

        Log::info(Auth::user()->getFullName().' has created a new School ');

        return redirect()->back()->with('message', 'New School successfully created!');
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
            // get a single school
            $school = Ecole::findOrfail($id);

            return response()->json(['status' => 'success', 'data' => $school]);
            // return the single school
            // return new schoolResource($school);
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
            'ecole_name' => 'required',
            'ecole_type' => 'required',
            'ecole_representative' => 'required',
            'ecole_address' => 'required',
            'ecole_location' => 'required',
            'ecole_phone' => 'required',
        ]);

        $school = Ecole::findOrfail($request->input('id'));

        if ($request->ajax()) {
            $school->update([
                'ecole_name' => $request->input('ecole_name'),
                'ecole_type' => $request->input('ecole_type'),
                'ecole_representative' => $request->input('ecole_representative'),
                'ecole_address' => $request->input('ecole_address'),
                'ecole_location' => $request->input('ecole_location'),
                'ecole_phone' => $request->input('ecole_phone'),
            ]);

            Log::info(Auth::user()->getFullName().' has updated '.$school->ecole_name.' school Details');

            return response()->json([
                'status' => 'success',
                'message' => 'school successfully updated!',
            ]);
        }

        $school->update([
            'ecole_name' => $request->input('ecole_name'),
            'ecole_type' => $request->input('ecole_type'),
            'ecole_representative' => $request->input('ecole_representative'),
            'ecole_address' => $request->input('ecole_address'),
            'ecole_location' => $request->input('ecole_location'),
            'ecole_phone' => $request->input('ecole_phone'),
        ]);

        return redirect()->back()->with('message', 'School successfully Updated!');
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
            $school = Ecole::findOrfail($id);

            $school->delete();

            Log::info(Auth::user()->getFullName().' has deleted a School Details');

            return response()->json(['status' => 'success', 'message' => 'School Information delete!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }
}
