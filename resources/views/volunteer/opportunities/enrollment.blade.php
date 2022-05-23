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
            <h4 class="text-center">Enrollments</h4>
            <table id="example" class="table table-striped " style="width:100%">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Opportunity Name</th>
                        <th>Organzation Name</th>
                        <th>Email</th>
                        <th>Required Gender</th>

                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Enrollment as $enroll)
                        <tr>
                            <th scope="row">{{ $enroll->id }}</th>
                            <td>{{ $enroll->Opportunity->name }}</td>
                            <td>{{ $enroll->user->organization_name }}</td>
                            <td>{{ $enroll->user->email }}</td>
                            <td>{{ Str::ucfirst($enroll->Opportunity->gender) }}</td>


                            <td>
                                @if ($enroll->status == 2)
                                    in progress
                                @elseif ($enroll->status == 1)
                                    Rejected
                                @else
                                    Enrolled
                                @endif
        </div>

        </td>
        </tr>
        @endforeach
        </tbody>

        </table>


    </div>
    </div>


</x-volunteer-layout>
