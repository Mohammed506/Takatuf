<?php

namespace App\Http\Controllers\Volunteers;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        return view('volunteer.opportunities.enrollment', ['Enrollment' => Enrollment::where('volunteer_id', auth()->user()->id)->get()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $opportunity = Opportunity::findOrFail($request->opportunity_id);
        $user = auth()->user();
        if (Enrollment::where('volunteer_id', $user->id)->where('opportunity_id', $opportunity->id)->get()->first() == null) {

            $enrollment = new Enrollment();
            $enrollment->volunteer_id = $user->id;
            $enrollment->user_id = $opportunity->user_id;
            $enrollment->opportunity_id = $request->opportunity_id;
            $enrollment->save();
            return back()->with('success', 'Enrollment has been sent please check your status later ! ');
        } else {
            return back()->with('message', 'Your enrollment has been already sent please check you status .');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity, Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $enrollment = Enrollment::find($request->id);
        $enrollment->status = $request->status;
        $enrollment->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
    }
}
