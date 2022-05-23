<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<style type="text/css">
    .active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #008989;
        box-shadow: 0 1px 0 0 #008989;
    }

    .active-cyan input.form-control[type=text] {
        border-bottom: 1px solid #008989;
        box-shadow: 0 1px 0 0 #008989;
    }

    .active-cyan .fa,
    .active-cyan-2 .fa {
        color: #008989;
    }

    #edit {
        color: #008989;
    }

    #edit:hover {
        color: #00898991;

    }

    #delete-icon {
        color: red;
    }

    #delete-icon:hover {
        color: rgba(255, 0, 0, 0.727)
    }

    .pointer {
        cursor: pointer;
    }

    .pointer {}

    .bar1,
    .bar2,
    .bar3 {
        width: 35px;
        height: 5px;
        background-color: #008989;
        margin: 6px 0;
        transition: 0.4s;
        cursor: pointer;
    }



    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-9px, 6px);
        transform: rotate(-45deg) translate(-9px, 6px);
    }

    .change .bar2 {
        opacity: 0;
    }

    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-8px, -8px);
        transform: rotate(45deg) translate(-8px, -8px);
    }

</style>


<body class="font-sans antialiased " style="background: #ffff">
    <x-jet-banner />

    @livewire('navigation-menu')

    <!-- Page Heading -->


    <!-- Page Content -->
    <main class="p-1 my-container active-cont">
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts

    @stack('scripts')



    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

<script type="text/javascript">
    function myFunction(x) {
        x.classList.toggle("change");
    }
</script>

</html>
