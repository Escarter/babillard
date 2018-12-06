<?php

namespace App\Http\Controllers\Admin;

use App\Niveau;
use App\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::orderBy('filiere_name', 'asc')->get();
        $niveaux = Niveau::orderBy('niveau_name', 'asc')->get();

        return view('admin.filiere.index')->with(['filieres' => $filieres, 'niveaux' => $niveaux]);
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
            'filiere_name' => 'required',
            'niveau_id' => 'required',
        ]);

        if ($request->ajax()) {
            Filiere::create([
                'filiere_name' => $request->input('filiere_name'),
                'niveau_id' => $request->input('niveau_id'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'New Filiere successfully created!',
            ]);
        }

        Filiere::create([
            'filiere_name' => $request->input('filiere_name'),
            'niveau_id' => $request->input('niveau_id'),
        ]);

        Log::info(Auth::user()->getFullName().' has created a new Niveau ');

        return redirect()->back()->with('message', 'New Filiere successfully created!');
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
            $filiere = Filiere::findOrfail($id);

            return response()->json(['status' => 'success', 'data' => $filiere]);
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
            'filiere_name' => 'required',
            'niveau_id' => 'required',
        ]);

        $filiere = Filiere::findOrfail($request->input('id'));

        if ($request->ajax()) {
            $filiere->update([
                'filiere_name' => $request->input('filiere_name'),
                'niveau_id' => $request->input('niveau_id'),
            ]);

            Log::info(Auth::user()->getFullName().' has updated '.$filiere->filiere_name.' Filiere Details');

            return response()->json([
                'status' => 'success',
                'message' => 'Filiere successfully updated!',
            ]);
        }

        $filiere->update([
            'filiere_name' => $request->input('filiere_name'),
            'niveau_id' => $request->input('niveau_id'),
        ]);

        return redirect()->back()->with('message', 'Filiere successfully Updated!');
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
            $filiere = Filiere::findOrfail($id);

            $filiere->delete();

            Log::info(Auth::user()->getFullName().' has deleted a Filiere Details');

            return response()->json(['status' => 'success', 'message' => 'Filiere Information delete!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }
}
