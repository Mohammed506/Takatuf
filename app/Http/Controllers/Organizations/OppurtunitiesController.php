<?php

namespace App\Http\Controllers\Organizations;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Categorie;

class OppurtunitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {



        return view('organization.opportunities.index', ['opportunities' => Opportunity::whereBelongsTo(auth()->user())->filter(request(['search']))->get(), 'opporwithoutsearch' => Opportunity::whereBelongsTo(auth()->user()), 'categories' => Categorie::all()]);
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
    public function create()
    {
        return view('organization.opportunities.enrollment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $user = auth()->user();

        $data = new Opportunity();
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }









        $data->name = $request->name;
        $data->description = $request->description;
        $data->duration = $request->duration;
        $data->location = $request->location;
        $data->seats = $request->seats;
        $data->gender = $request->gender;
        $data->user_id = $user->id;
        $data->created_at = Carbon::now();
        $data->start = Carbon::parse($request->start)->format('Y-m-d');
        $data->finish = Carbon::parse($request->start)->addDays($request->duration - 1)->format('Y-m-d');
        $data->category_id = $request->category_id;

        $data->save();


        return back()->with('success', 'Opportunity has been created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        return view('organization.opportunities.opportunity', ['opportunity' => Opportunity::findOrFail($opportunity->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity, Request $request)
    {



        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);


        $input = $request->all();
        dd($opportunity->fill($input));
        $input['finish'] = Carbon::parse($request->start)->addDays($request->duration - 1)->format('Y-m-d');
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $opportunity['image'] = $filename;
        }



        $opportunity->fill($input)->save();



        return back()->with('success', 'Opportunity has been updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Opportunity $opportunity, Request $request)
    {



        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $input = dd($request->all());

        $opportunity->fill($input)->save();



        return back()->with('message', 'Opportunity has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return back()->with('message', 'Opportunity has been deleted');
    }
}
