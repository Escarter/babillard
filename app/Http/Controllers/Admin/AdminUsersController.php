<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id', 'name')->get();
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('admin.admin-users.index')->with(['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // Get validate request

        $validator = Validator::make(
                        $request->all(), [
                            'first_name' => 'required',
                            'last_name' => 'required',
                            'username' => 'required',
                            'email' => 'required',
                            'password' => 'required|min:8',
                        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors,
                'message' => 'Validation failed!',
            ]);
        }

        // create a new user

        $user = User::create([
           'first_name' => $request->input('first_name'),
           'last_name' => $request->input('last_name'),
           'email' => $request->input('email'),
           'username' => $request->input('username'),
           'password' => bcrypt($request->input('password')),
           'status' => $request->input('status'),
        ]);

        $role = Role::findOrfail($request->input('role_id'));
        $user->syncRoles($role->name);

        return response()->json(['status' => 'success', 'message' => __('New User successfully created!')]);
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
            $user = User::findOrfail($id);
            $role = null;
            if ($user->getRoleNames()) {
                $role = Role::where('name', $user->getRoleNames()->first())->get();
            }

            return response()->json(['status' => 'success', 'data' => $user, 'role' => $role]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'data' => __('Something is wrong please contact the amdin')]);
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
                            'first_name' => 'required',
                            'last_name' => 'required',
                            'email' => 'required',
                            'status' => 'required',
                        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors,
                'message' => 'Validation failed!',
            ]);
        }
        $user = User::findOrfail($request->input('id'));

        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => $request->input('password') == null ? $user->password : bcrypt($request->input('password')),
            'status' => $request->input('status'),
         ]);
        $role = Role::findOrfail($request->input('role_id'));
        $user->syncRoles($role->name);

        return response()->json(['status' => 'success', 'message' => 'Details for  '.$user->first_name.' Successfully Updated!']);
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
            $user = User::findOrfail($id);

            $user->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'User '.$user->first_name.' has been deleted successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => __('Something is broken please contact the admin')]);
        }
    }

    public function viewProfile()
    {
        return view('admin.users.partials.profile-settings');
    }

    public function updateProfile(Request $request)
    {
        //dd($request->all());
        //validate request
        $validator = Validator::make(
                        $request->all(), [
                            'first_name' => 'required',
                            'last_name' => 'required',
                            'email' => 'required',
                            'password' => 'required|confirmed|min:8',
                        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        //Todo check oldpassword corresponds to what is saved during password update
        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()
            ->with('error', __('Current Password does not match what is saved!'));
        }

        $user->first_name = $request->input('first_name') == null ? $user->first_name : $request->input('first_name');
        $user->last_name = $request->input('last_name') == null ? $user->last_name : $request->input('last_name');
        $user->phone = $request->input('phone') == null ? $user->phone : $request->input('phone');
        $user->email = $request->input('email') == null ? $user->email : $request->input('email');
        $user->username = $request->input('username');
        $user->password = $request->input('password') == null ? $user->password : bcrypt($request->input('password'));

        $user->save();

        return redirect()->back()->with(['success' => __('Profile Setting updated successfully')]);
    }
}
