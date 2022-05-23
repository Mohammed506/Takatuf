<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function completedUpdate(Request $request, $id)
    {


        $enrollment = Enrollment::findOrFail($id);
        $opportunity = Opportunity::findOrFail($enrollment->opportunity_id);
        // Set ALL records to a status of 0
        // DB::table('enrollments')->where('status', 1)->update(['status' => 0]);


        // Set the passed record to a status of what ever is passed in the Request

        $enrollment->status = $request->changeStatus;
        $enrollment->volunteer_id = $enrollment->volunteer_id;
        $enrollment->user_id = $enrollment->user_id;

        if ($request->changeStatus == 1) {
            $opportunity->seats = $opportunity->seats;
        } elseif ($request->changeStatus == 0) {
            $opportunity->seats = $opportunity->seats - 1;
        }
        $opportunity->save();
        $enrollment->save();
        return redirect()->back()->with('message', 'Status changed!');
    }
}
