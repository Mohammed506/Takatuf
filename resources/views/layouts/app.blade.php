<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">




    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>





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









    @livewireStyles

    <!-- Scripts -->

    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

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


</body>
<script type="text/javascript">
    var menu_btn = document.querySelector("#menu-btn");
    var sidebar = document.querySelector("#sidebar");
    var container = document.querySelector(".my-container");
    var icon = document.querySelector("#menu-icon");
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");


    });

    function myFunction(x) {
        x.classList.toggle("change");
    }




    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/changeStatus',
                data: {
                    'status': status,
                    'user_id': user_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    })
</script>
<script>
    function changeUserStatus(_this, id) {
        var status = $(_this).prop('checked') == true ? 1 : 0;
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: `/change-status`,
            type: 'post',
            data: {
                _token: _token,
                id: id,
                status: status
            },
            success: function(result) {}
        });
    }
</script>


</html>
