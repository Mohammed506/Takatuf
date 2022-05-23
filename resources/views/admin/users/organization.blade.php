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

    <!-- Way 1: Display All Error Messages -->

    <div class="container">
        <div class="row">
            <h4 class="text-center">Organizations</h4>
            <x-jet-validation-errors class="mb-3" />

            <table id="example" class="table table-striped " style="width:100%">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizations as $organization)
                        <tr>
                            <th scope="row">{{ $organization->id }}</th>
                            <td>{{ $organization->organization_name }}</td>
                            <td>{{ $organization->email }}</td>


                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $organization->id }}">
                                    <i class="fas fa-edit fa-lg" id="edit"></i></a>
                                @include('admin.users.organizationmodal')
                                <form method="post" style="display: inline"
                                    action="{{ route('admin.organizations.destroy', $organization->id) }}">
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
                        <td colspan="4" class="text-center" class="text-center">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2" style="color: #008989 ;padding-left:29px;width:100%">
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
                                Organization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.organizations.index') }}" method="post"
                                enctype="multipart/form-data">



                                @csrf

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Organization Name
                                    </label>
                                    <input name="organization_name" type="text" class="form-control"
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
                                    <x-jet-label value="{{ __('Password') }}" />

                                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        type="password" name="password" required autocomplete="new-password" />
                                    <x-jet-input-error for="password"></x-jet-input-error>
                                </div>

                                <div class="form-group">
                                    <x-jet-label value="{{ __('Confirm Password') }}" />

                                    <x-jet-input class="form-control" type="password" name="password_confirmation"
                                        required autocomplete="new-password" />
                                </div>

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
