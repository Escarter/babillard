<?php

namespace App\Http\Controllers\Admin;

use App\Ecole;
use Carbon\Carbon;
use App\Publication;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    use ActivityLogger;

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
        //validate request
        $validator = Validator::make(
                $request->all(), [
                    'publication_name' => 'required',
                    'publication_type' => 'required',
                    'publication_description' => 'required',
                    'publication_file_path' => 'required',
                    'publication_target' => 'required',
                ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => 'Validation failed!',
            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()->with([
                'error' => 'Validation failed!',
            ]);
        }

        // create a new user

        $pub = Publication::create([
            'user_id' => Auth::user()->id,
            'ecole_id' => Auth::user()->ecole->id,
            'publication_name' => $request->input('publication_name'),
            'publication_type' => $request->input('publication_type'),
            'publication_description' => $request->input('publication_description'),
            'publication_target' => $request->input('publication_target'),
            'publication_date' => Carbon::now(),
            'publication_expiry_date' => $request->input('publication_expiry_date') == null ? Carbon::now()->addWeeks(2) : Carbon::parse($request->input('publication_expiry_date')),
        ]);

        if ($request->hasFile('publication_file_path')) {
            //Save Image
            $image_data = $request->file('publication_file_path');
            $ext = $image_data->getClientOriginalExtension();
            $image_name = kebab_case($pub->publication_name).'-'.time().'.'.$ext;
            $path = public_path().'/publication/'.$request->input('publication_type').'/';

            $image_data->move($path, $image_name);

            $pub->update([
                'publication_file_path' => '/publication/'.$request->input('publication_type').'/'.$image_name,
            ]);
        }

        $this->logActivity(Auth::user(), 'publication_creation', 'Published - '.Auth::user()->getFullName());

        // return user resource with message

        return redirect()->back()->with([
            'success' => 'New publication successfully created!',
        ]);
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
            $pub = Publication::findOrfail($id);

            return response()->json(['status' => 'success', 'data' => $pub]);
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
        //validate request
        $validator = Validator::make(
                        $request->all(), [
                            'publication_name' => 'required',
                            'publication_type' => 'required',
                            'publication_description' => 'required',
                            // 'publication_file_path' => 'required',
                            'publication_target' => 'required',
                        ]);

        if ($validator->fails()) {
            return redirect()->back()->with([
                                'error' => 'Validation failed!',
                            ]);
        }
        if ($validator->fails()) {
            return redirect()->back()->with([
                                'error' => 'Validation failed!',
                            ]);
        }

        $pub = Publication::findOrfail($request->input('id'));

        $pub->update([
            'user_id' => Auth::user()->id,
            'ecole_id' => Auth::user()->ecole->id,
            'publication_name' => $request->input('publication_name'),
            'publication_type' => $request->input('publication_type'),
            'publication_description' => $request->input('publication_description'),
            'publication_target' => $request->input('publication_target'),
            'publication_date' => Carbon::now(),
            'publication_expiry_date' => $request->input('publication_expiry_date') == null ? Carbon::now()->addWeeks(2) : Carbon::parse($request->input('publication_expiry_date')),
        ]);

        if ($request->hasFile('publication_file_path')) {
            //Save Image
            $image_data = $request->file('publication_file_path');
            $ext = $image_data->getClientOriginalExtension();
            $image_name = kebab_case($pub->publication_name).'-'.time().'.'.$ext;
            $path = public_path().'/publication/'.$request->input('publication_type').'/';

            $image_data->move($path, $image_name);

            $pub->update([
                'publication_file_path' => '/publication/'.$request->input('publication_type').'/'.$image_name,
            ]);
        }

        $this->logActivity(Auth::user(), 'publication_update', 'Updated Publication - '.$pub->publication_name);

        // return user resource with message

        return redirect()->back()->with(['success' => 'publication successfully updated!']);
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
            $publication = Ecole::findOrfail($id);

            $publication->delete();

            Log::info(Auth::user()->getFullName().' has deleted a School Details');

            return response()->json(['status' => 'success', 'message' => 'School Information delete!']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }
}
