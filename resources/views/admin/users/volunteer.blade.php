<x-volunteer-layout>
    <nav class="navbar top-navbar navbar-light px-5">
        <div id="menu-btn" class="change" onclick="myFunction(this)">
            <div class="change bar1"></div>
            <div class="change bar2"></div>
            <div class="change bar3"></div>
        </div>

    </nav>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <x-jet-validation-errors class="mb-3" />
    <div class="container">
        <div class="row">
            <h4 class="text-center">Volunteers</h4>
            <table id="example" class="table table-striped " style="width:100%">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phonenumber</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($volunteers as $volunteer)
                        <tr>
                            <th scope="row">{{ $volunteer->id }}</th>
                            <td>{{ $volunteer->first_name }}</td>
                            <td>{{ $volunteer->last_name }}</td>
                            <td>{{ $volunteer->volunteer_username }}</td>
                            <td>{{ $volunteer->email }}</td>
                            <td>{{ $volunteer->volunteer_phonenumber }}</td>

                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $volunteer->id }}">
                                    <i class="fas fa-edit fa-lg" id="edit"></i></a>
                                @include('admin.users.volunteermodal')

                                <form method="post" style="display: inline"
                                    action="{{ route('admin.volunteers.destroy', $volunteer->id) }}">
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
                <tfoot>
                    <tr>


                        <td colspan="7" class="text-center">


                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2" style="color: #008989 ;padding-left:80px;width:100%">
                                Create New Volunteer +
                            </button>



                        </td>
                    </tr>
                </tfoot>

            </table>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create
                                Volunteer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.volunteers.store') }}" method="post"
                                enctype="multipart/form-data">



                                @csrf

                                <div class="form-group">
                                    <label for="formGroupExampleInput">First name
                                    </label>
                                    <input name="first_name" type="text" class="form-control"
                                        id="formGroupExampleInput" required>
                                    <div class="invalid-feedback">
                                        Please enter opportunity name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Last_name</label>
                                    <input name="last_name" type="text" class="form-control"
                                        id="formGroupExampleInput" required>
                                    <div class="invalid-feedback">
                                        Please enter opportunity name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Username</label>
                                    <input name="volunteer_username" type="text" class="form-control"
                                        id="formGroupExampleInput" required>
                                    <div class="invalid-feedback">
                                        Please enter opportunity name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Email</label>
                                    <input name="email" type="email" class="form-control" id="formGroupExampleInput"
                                        required>
                                    <div class="invalid-feedback">
                                        Please enter opportunity name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">PhoneNumber</label>
                                    <input name="volunteer_phonenumber" type="text" class="form-control"
                                        id="formGroupExampleInput" required>
                                    <div class="invalid-feedback">
                                        Please enter opportunity name
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <h6 class=" pb-1">Gender: </h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="volunteer_gender"
                                            id="femaleGender" value="female" checked />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="volunteer_gender"
                                            id="maleGender" value="male" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>



                                </div>




                                <div class="form-group">
                                    <x-jet-label value="{{ __('Password') }}" />

                                    <x-jet-input type="password" name="password" required autocomplete="new-password" />

                                </div>

                                <div class="form-group">
                                    <x-jet-label value="{{ __('Confirm Password') }}" />

                                    <x-jet-input class="form-control" type="password" name="password_confirmation"
                                        required autocomplete="new-password" />
                                </div>






                                <div class="modal-footer">
                                    <button type="button" class="btn text-white" data-bs-dismiss="modal"
                                        style="background:#43425d">Cancle</button>
                                    <input type="submit" class="btn" style="background:#008989 ;color:white"
                                        value="Create">
                            </form>
                        </div>
                    </div>
                </div>



            </div>




        </div>
    </div>


</x-volunteer-layout>
