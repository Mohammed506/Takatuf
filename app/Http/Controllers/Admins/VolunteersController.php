<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class VolunteersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.volunteer', ['volunteers' => User::where('role_id', '=', 2)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $validatedData = $request->validate([
            'volunteer_username' => 'unique:users',
            'password' => 'confirmed|min:8',
            'email' => 'required|email|unique:users'
        ]);
        $user->role_id = 2;
        $user->volunteer_username = $validatedData['volunteer_username'];
        $user->email = $validatedData['email'];
        $user->volunteer_phonenumber = $request->volunteer_phonenumber;
        $user->password = Hash::make($validatedData['password']);
        $user->volunteer_gender = $request->volunteer_gender;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        return back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        $user = User::find($request->volunteer_id);
        $validatedData = $request->validate([
            'volunteer_username' => Rule::unique('users')->ignore($user->id),

            'email' => Rule::unique('users')->ignore($user->id),
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->volunteer_username = $validatedData['volunteer_username'];
        $user->email = $validatedData['email'];
        $user->volunteer_phonenumber = $request->volunteer_phonenumber;
        $user->save();










        return back()->with('success', 'Volunteer information has been updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {

        dd($request->volunteer_id);
        $validatedData = $request->validate([
            'volunteer_username' => 'unique:users',

            'email' => 'required|email|unique:users'
        ]);
        $user = User::find($request->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->volunteer_username = $validatedData['volunteer_username'];
        $user->email = $validatedData['email'];
        $user->volunteer_phonenumber = $request->volunteer_phonenumber;
        $user->save();










        return back()->with('success', 'Opportunity has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();


        return back()->with('message', 'Volunteer user has been deleted');
    }
}
