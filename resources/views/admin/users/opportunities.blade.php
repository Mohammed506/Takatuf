<x-volunteer-layout>
    <nav class="navbar top-navbar navbar-light px-5">
        <div id="menu-btn" class="change" onclick="myFunction(this)">
            <div class="change bar1"></div>
            <div class="change bar2"></div>
            <div class="change bar3"></div>
        </div>

    </nav>
    <div class="container">
        <div class="row">
            <h4 class="text-center">Opportunities</h4>
            <table id="example" class="table table-striped " style="width:100%">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Opportunity Name</th>
                        <th>Organization Name</th>
                        <th>Start-date</th>
                        <th>Finish-date</th>
                        <th>Gender Required</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opportunities as $opportunity)
                        <tr>
                            <th scope="row">{{ $opportunity->id }}</th>
                            <td>{{ $opportunity->name }}</td>
                            <td>{{ $opportunity->user->organization_name }}</td>
                            <td>{{ $opportunity->start }}</td>
                            <td>{{ $opportunity->finish }}</td>
                            <td>{{ Str::ucfirst($opportunity->gender) }}</td>

                            <td>

                                <form method="post" style="display: inline"
                                    action="{{ route('admin.opportunities.destroy', $opportunity->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" style="border:none ; background:transparent ;"> <i
                                            onclick="return confirm('Are you sure you Want Delete?')"
                                            class="fa fa-trash fa-lg" aria-hidden="true" id="delete-icon"></i></button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>


        </div>
    </div>


</x-volunteer-layout>
