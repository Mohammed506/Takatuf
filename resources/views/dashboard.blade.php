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


    <!--End Top Nav -->
    <div class="album py-5 ">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @if ($opporwithoutsearch->count())
                    @foreach ($opportunities as $opportunity)
                        @php
                        @endphp
                        <div
                            class="col @if ($opportunity->seats == 0) d-none @endif @if ($opportunity->finish < $currentDate) d-none @endif">
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

                                    <p class="card-text"
                                        style="margin-bottom:0.5rem;@if ($opportunity->seats > 1) color:#008989; @else color:red; @endif">
                                        {{ $opportunity->seats }}
                                    <div> Seats</div>
                                    </p>
                                    @if (auth()->user()->role_id == 2)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">

                                                <a
                                                    href="{{ route('volunteer.opportunities.show', $opportunity->id) }}">
                                                    <button type="button"
                                                        class="btn btn-md btn-outline-secondary">View</button></a>

                                            </div>
                                            <small class="text-muted">{{ $opportunity->start }} -
                                                {{ $opportunity->finish }}</small>

                                            <small class="text-muted"> <a
                                                    class="badge text-decoration-none link-light align-items-center justify-content-center text-center"
                                                    style="background: #008989 "
                                                    href="#">{{ $opportunity->category()->first()->name }}</a></small>
                                            {{-- <small class="text-muted">Seat: 10</small> --}}

                                        </div>
                                    @elseif (auth()->user()->role_id == 3)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">

                                                <a
                                                    href="{{ route('organization.opportunities.show', $opportunity->id) }}">
                                                    <button type="button"
                                                        class="btn btn-md btn-outline-secondary">View</button></a>

                                            </div>
                                            <small class="text-muted">{{ $opportunity->start }} -
                                                {{ $opportunity->finish }}</small>

                                            <small class="text-muted"> <a
                                                    class="badge text-decoration-none link-light align-items-center justify-content-center text-center"
                                                    style="background: #008989 "
                                                    href="#">{{ $opportunity->category()->first()->name }}</a></small>
                                            {{-- <small class="text-muted">Seat: 10</small> --}}

                                        </div>
                                    @elseif(auth()->user()->role_id == 1)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">

                                                <a href="{{ route('admin.opportunities.show', $opportunity->id) }}">
                                                    <button type="button"
                                                        class="btn btn-md btn-outline-secondary">View</button></a>

                                            </div>
                                            <small class="text-muted">{{ $opportunity->start }} -
                                                {{ $opportunity->finish }}</small>

                                            <small class="text-muted"> <a
                                                    class="badge text-decoration-none link-light align-items-center justify-content-center text-center"
                                                    style="background: #008989 "
                                                    href="#">{{ $opportunity->category()->first()->name }}</a></small>
                                            {{-- <small class="text-muted">Seat: 10</small> --}}

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center" style="font-weight: bold ;width:100%"> There are no opportunities yet .
                    </p>

                @endif


            </div>
        </div>
    </div>




</x-app-layout>
