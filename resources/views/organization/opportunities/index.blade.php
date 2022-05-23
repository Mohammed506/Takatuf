<x-app-layout>
    <!-- Top Nav -->
    <nav class="navbar top-navbar navbar-light px-5">
        <div id="menu-btn" class="change" onclick="myFunction(this)">
            <div class="change bar1"></div>
            <div class="change bar2"></div>
            <div class="change bar3"></div>
        </div>

    </nav>
    <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2" method="GET">

        <input class="form-control form-control-sm mr-3 w-50" type="text" placeholder="Search" aria-label="Search"
            value="{{ request('search') }}" name="search">
        <i class="fas fa fa-search btn fa-lg" aria-hidden="true" style="      margin-left: -38px;
        margin-top: 9px;

        "></i>

    </form>
    @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <!--End Top Nav -->
    <div class="album py-5 ">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



                @if ($opporwithoutsearch->count())
                    <div class="card text-center">
                        <div class="card-header p-3" style="background: #008989">

                        </div>
                        <div class="card-body p-4" style="background: #f2f9f9 ">
                            <h5 class="card-title "></h5>
                            <p class="card-text"> <button type="button" class="btn"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: #008989">
                                    Create New Opportunity +
                                </button></p>

                        </div>
                        <div class="card-footer text-muted" style="background: #f2f9f9 ">

                        </div>
                    </div>
                    @foreach ($opportunities as $opportunity)
                        <div class="col">

                            <div class="card shadow-sm btn" style="padding:0px">
                                <div class="card-header py-4 px-3"
                                    style="font-size: 19px ;background:#008989 ;color:white">
                                    {{ $opportunity->name }}
                                </div>

                                <div class="card-body" style="background: #f2f9f9 ; color:#43425d">
                                    <p class="card-text">
                                        {{ Str::limit($opportunity->description, 30, $end = '.......') }}
                                    </p>
                                    <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="8"
                                            height="11" viewBox="0 0 8 11">
                                            <path id="ic_place_24px"
                                                d="M9,2A3.924,3.924,0,0,0,5,5.85C5,8.738,9,13,9,13s4-4.263,4-7.15A3.924,3.924,0,0,0,9,2ZM9,7.225A1.376,1.376,0,1,1,10.429,5.85,1.4,1.4,0,0,1,9,7.225Z"
                                                transform="translate(-5 -2)" fill="#43425d" />
                                        </svg> {{ $opportunity->location }}</p>

                                    <p class="card-text">{{ $opportunity->seats }}<br> Seats</p>


                                    <div class="d-flex justify-content-between align-items-center">



                                        <small class="text-muted">
                                            <a class="badge text-decoration-none link-light align-items-center justify-content-center text-center"
                                                style="background: #008989 "
                                                href="#">{{ $opportunity->category()->first()->name }}</a>
                                        </small>
                                        <small class="text-muted">{{ $opportunity->start }} -
                                            {{ $opportunity->finish }}</small>
                                        <div>




                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit{{ $opportunity->id }}"> <i
                                                    class="fas fa-edit fa-lg" id="edit"></i></a>



                                            {{-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Opportunity</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('organization.opportunities.edit', $opportunity) }}"
                                                                method="PATCH">



                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput">Opportunity
                                                                        Name</label>
                                                                    <input name="name" type="text"
                                                                        class="form-control"
                                                                        id="formGroupExampleInput"
                                                                        value={{ $opportunity->name }}required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter opportunity name
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="formGroupExampleInput2">Description</label>
                                                                    <textarea name="description" cols="10" rows="5" class="form-control input-lg" id="formGroupExampleInput2" required>
                                                                 </textarea>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a description

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="formGroupExampleInput3">Starting-Date</label>
                                                                    <input name="start" type="date"
                                                                        class="form-control"
                                                                        id="formGroupExampleInput3" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter starting date

                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="formGroupExampleInput4">Duration</label>
                                                                    <input name="duration" type="number"
                                                                        class="form-control"
                                                                        id="formGroupExampleInput4">
                                                                    <div class="invalid-feedback">
                                                                        Please enter duration
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="">
                                                                <div class="form-group ">
                                                                    <label for="formGroupExampleInput4">Number of
                                                                        seats</label>
                                                                    <input name="seats" type="number"
                                                                        class="form-control"
                                                                        id="formGroupExampleInput4" min="1">
                                                                    <div class="invalid-feedback">
                                                                        Please enter valid number of seats
                                                                    </div>
                                                                </div>
                                                                <div class="form-group d-none">
                                                                    <label for="formGroupExampleInput4">End-date</label>
                                                                    <input name="finish" type="date"
                                                                        class="form-control"
                                                                        id="formGroupExampleInput4"
                                                                        placeholder="11/11/2021">
                                                                    <div class="invalid-feedback">
                                                                        Please enter finishing date
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="formGroupExampleInput4">Location</label>
                                                                    <input name="location" type="text"
                                                                        class="form-control"
                                                                        id="formGroupExampleInput4">
                                                                    <div class=" invalid-feedback">
                                                                        Please enter valid number of seats
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">

                                                                    <h6 class="mt-1">Required Gender: </h6>

                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="femaleGender"
                                                                            value="female" checked />
                                                                        <label class="form-check-label"
                                                                            for="femaleGender">Female</label>
                                                                    </div>

                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="maleGender"
                                                                            value="male" />
                                                                        <label class="form-check-label"
                                                                            for="maleGender">Male</label>
                                                                    </div>



                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="formGroupExampleInput4">Image</label>
                                                                    <input name="image" type="file"
                                                                        class="form-control"
                                                                        value="{{ $opportunity->image }}"
                                                                        id="formGroupExampleInput4">
                                                                    <div class="invalid-feedback">
                                                                        Please enter valid image
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="formGroupExampleInput4">Category</label>
                                                                    <select name="category_id" class="form-select"
                                                                        id="formGroupExampleInput4">
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please enter duration
                                                                    </div>
                                                                </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn text-white"
                                                                data-bs-dismiss="modal"
                                                                style="background:#43425d">Cancle</button>
                                                            <input type="submit" class="btn"
                                                                style="background:#008989 ;color:white" value="Edit">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @include('modal')







                                            <form method="post" style="display: inline"
                                                action="{{ route('organization.opportunities.destroy', $opportunity) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" style="border:none ; background:#f2f9f9 ;"> <i
                                                        onclick="return confirm('Are you sure you Want Delete?')"
                                                        class="fa fa-trash fa-lg" aria-hidden="true"
                                                        id="delete-icon"></i></button>
                                            </form>


                                        </div>
                                        {{-- <small class="text-muted">Seat: 10</small> --}}

                                    </div>



                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create
                                        Opportunity</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('organization.opportunities.store', auth()->user()) }}"
                                        method="post" enctype="multipart/form-data">



                                        @csrf
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Opportunity
                                                Name</label>
                                            <input name="name" type="text" class="form-control" placeholder="Name"
                                                placeholder="Add name for your opportunity" id="formGroupExampleInput"
                                                required>
                                            <div class="invalid-feedback">
                                                Please enter opportunity name
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Description</label>
                                            <textarea name="description" cols="10" rows="5" class="form-control input-lg" id="formGroupExampleInput2"
                                                placeholder="Descripe you opportunity actvities and benefits here"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter a description

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Starting-Date</label>
                                            <input name="start" type="date" class="form-control"
                                                id="formGroupExampleInput3" required>
                                            <div class="invalid-feedback">
                                                Please enter starting date

                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Duration</label>
                                            <input name="duration" type="number" class="form-control"
                                                placeholder="Number of days of the opportunity (min=1)"
                                                id="formGroupExampleInput4" min="1" required>
                                            <div class="invalid-feedback">
                                                Please enter duration
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Number of
                                                seats</label>
                                            <input name="seats" type="number" class="form-control" placeholder="10"
                                                placeholder="10" id="formGroupExampleInput4" min="1" required>
                                            <div class="invalid-feedback">
                                                Please enter valid number of seats
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Location</label>
                                            <input name="location" type="text" class="form-control"
                                                placeholder="city,country" id="formGroupExampleInput4" required>
                                            <div class="invalid-feedback">
                                                Please enter valid number of seats
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Image</label>
                                            <input name="image" type="file" class="form-control"
                                                id="formGroupExampleInput4" required>
                                            <div class="invalid-feedback">
                                                Please enter valid image
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <h6 class="mt-1">Required Gender: </h6>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="femaleGender" value="female" checked />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="maleGender" value="male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>



                                        </div>
                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Category</label>
                                            <select name="category_id" class="form-select"
                                                id="formGroupExampleInput4">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter duration
                                            </div>
                                        </div>
                                        <div class="form-group d-none">
                                            <label for="formGroupExampleInput4">End-date</label>
                                            <input name="finish" type="date" class="form-control"
                                                id="formGroupExampleInput4" placeholder="11/11/2021">
                                            <div class="invalid-feedback">
                                                Please enter finishing date
                                            </div>
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
                @else
                    <p class="text-center" style="font-weight: bold ;width:100%"> You have no opportunities yet .
                    </p>
                    <div class="card text-center">
                        <div class="card-header p-3" style="background: #008989">

                        </div>
                        <div class="card-body p-4" style="background: #f2f9f9 ">
                            <h5 class="card-title "></h5>
                            <p class="card-text"> <button type="button" class="btn"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal2" style="color: #008989">
                                    Create New Opportunity +
                                </button></p>

                        </div>
                        <div class="card-footer text-muted" style="background: #f2f9f9 ">

                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create
                                        Opportunity</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('organization.opportunities.store', auth()->user()) }}"
                                        method="post" enctype="multipart/form-data">



                                        @csrf
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Opportunity
                                                Name</label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Add name for your opportunity" id="formGroupExampleInput"
                                                required>
                                            <div class="invalid-feedback">
                                                Please enter opportunity name
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2">Description</label>
                                            <textarea name="description" cols="10" rows="5" class="form-control input-lg" id="formGroupExampleInput2"
                                                placeholder="Descripe you opportunity actvities and benefits here"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Please enter a description

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3">Starting-Date</label>
                                            <input name="start" type="date" class="form-control"
                                                id="formGroupExampleInput3" required>
                                            <div class="invalid-feedback">
                                                Please enter starting date

                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Duration</label>
                                            <input name="duration" type="number" class="form-control"
                                                placeholder="Number of days of the opportunity (min=1)"
                                                id="formGroupExampleInput4" min="1" required>
                                            <div class="invalid-feedback">
                                                Please enter duration
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Number of
                                                seats</label>
                                            <input name="seats" type="number" class="form-control" placeholder="10"
                                                id="formGroupExampleInput4" min="1" required>
                                            <div class="invalid-feedback">
                                                Please enter valid number of seats
                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Location</label>
                                            <input name="location" type="text" class="form-control"
                                                placeholder="city,country" id="formGroupExampleInput4" required>
                                            <div class="invalid-feedback">
                                                Please enter valid number of seats
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Image</label>
                                            <input name="image" type="file" class="form-control"
                                                id="formGroupExampleInput4" required>
                                            <div class="invalid-feedback">
                                                Please enter valid image
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <h6 class="mt-1">Required Gender: </h6>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="femaleGender" value="female" checked />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="maleGender" value="male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>



                                        </div>
                                        <div class="form-group ">
                                            <label for="formGroupExampleInput4">Category</label>
                                            <select name="category_id" class="form-select"
                                                id="formGroupExampleInput4">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please enter duration
                                            </div>
                                        </div>
                                        <div class="form-group d-none">
                                            <label for="formGroupExampleInput4">End-date</label>
                                            <input name="finish" type="date" class="form-control"
                                                id="formGroupExampleInput4" placeholder="11/11/2021">
                                            <div class="invalid-feedback">
                                                Please enter finishing date
                                            </div>
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









                @endif




            </div>
        </div>
    </div>


</x-app-layout>
