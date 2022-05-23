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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Enrollment as $enroll)
                        <tr>
                            <th scope="row">{{ $enroll->id }}</th>
                            <td>{{ $enroll->Opportunity->name }}</td>
                            <td>{{ $enroll->volunteer->volunteer_username }}</td>
                            <td>{{ $enroll->volunteer->email }}</td>
                            <td>{{ $enroll->volunteer->volunteer_phonenumber }}</td>
                            <td>{{ Str::ucfirst($enroll->volunteer->volunteer_gender) }}</td>

                            <td>
                                @if ($enroll->status == 2)
                                    <form action="{{ route('completedUpdate', ['id' => $enroll->id]) }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <button data-id="{{ $enroll->id }}" type="submit" class="btn btn-success"
                                            name="changeStatus" value="0">Accept</button>
                                        <button type="submit" class="btn btn-danger" name="changeStatus"
                                            data-id="{{ $enroll->id }}" value="1">Reject</button>

                                    </form>
                                @elseif ($enroll->status == 1)
                                    Rejected
                                @else
                                    Accepted
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
