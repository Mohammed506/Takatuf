<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\User;
use Carbon\Carbon;


class opportunityController extends Controller
{
    public function index()
    {

        return view('dashboard', ['opportunities' => Opportunity::latest()->filter(request(['search']))->get(), 'opporwithoutsearch' => Opportunity::all(), 'currentDate' => Carbon::now()->format('Y-m-d')]);
    }
    public function getOpportunity(Opportunity $opportunity)
    {
        return view('opportunity', ['opportunity' => Opportunity::findOrFail($opportunity->id)]);
    }
}
