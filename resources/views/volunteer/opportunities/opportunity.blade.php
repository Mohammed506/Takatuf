<x-app-layout>
    <nav class="navbar top-navbar navbar-light px-5">
        <div id="menu-btn" class="change" onclick="myFunction(this)">
            <div class="change bar1"></div>
            <div class="change bar2"></div>
            <div class="change bar3"></div>
        </div>

    </nav>

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
    <div class="container mt-5 align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 align-items-center justify-content-center">

                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4 align-items-center justify-content-center">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1 align-items-center justify-content-center text-center">
                            {{ $opportunity->name }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2 align-items-center justify-content-center text-center">
                            Added on {{ $opportunity->created_at->format('Y-m-d') }} by
                            {{ $opportunity->user()->first()->organization_name }}</div>
                        <!-- Post categories-->
                        <a class="badge text-decoration-none link-light align-items-center justify-content-center text-center"
                            style="background: #008989 " href="#">{{ $opportunity->category()->first()->name }}</a>

                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4 align-items-center justify-content-center"><img class="img-fluid rounded"
                            src="{{ asset("images/$opportunity->image") }}" width="700px" height="350px" alt="..." />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <h2 class="fw-bolder mb-1">Description</h2>

                        <p class="fs-5 mb-4">{{ $opportunity->description }}</p>
                        <h3 class="fw-bolder mb-1">Gender Required</h3>
                        <p class="fs-5 mb-4">{{ ucfirst($opportunity->gender) }}</p>
                        <h3 class="fw-bolder mb-1">Location</h3>
                        <p class="fs-5 mb-4">{{ ucfirst($opportunity->location) }}</p>
                        <h3 class="fw-bolder mb-1">Start-date</h3>
                        <p class="fs-5 mb-4">{{ ucfirst($opportunity->start) }}</p>
                        <h3 class="fw-bolder mb-1">End-date</h3>
                        <p class="fs-5 mb-4">{{ ucfirst($opportunity->finish) }}</p>

                    </section>


                    <form action="{{ route('volunteer.enrollments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="opportunity_id" value="{{ $opportunity->id }}">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" style="width:100%" name="" id=""
                            value="Enroll now !">





                </article>



</x-app-layout>
