<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <meta name="description" content="Mart Groothuis SnapperChat: encrypted chat app">

    <meta name="keywords" content="Mart Groothuis, SnapperChat, encrypted chat app">

    <link rel="manifest" href="{{ asset('site.webmanifest')}}">


    <!-- Scripts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
            crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">

</head>
<body>

<nav class="noselect">

    {{--search menu--}}
    <div class="d-flex wrapper" id="wrapper-search">
        <div class="sidebar-container">
            <div class="bg-light border-right sidebar sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <div class="sidebar-heading pointer bg-red text-light search-toggle d-flex justify-content-between align-items-center"
                         aria-label="search-toggle">Search for others
                        <i class="fa fa-angle-left fa-lg"></i>
                    </div>
                    @if( Auth::check() )
                        <a class="list-group-item list-group-item-action bg-light nobordertop ">
                            <input id="search" type="text" class="form-control" name="search">
                        </a>
                        <div class="userlist">
                            @foreach($users as $user)
                                <a
                                        class="list-group-item list-group-item-action bg-light"
                                        onclick="toggleUserMenu({{ $user->id }})">{{ $user->username }}</a>


                            @endforeach
                        </div>
                    @else
                        <a class="list-group-item list-group-item-action bg-light">register your key to search for
                            others</a>


                    @endif


                </div>
            </div>
        </div>
    </div>

    {{--notification menu--}}
    <div class="d-flex wrapper" id="wrapper-notification">
        <div class="sidebar-container">
            <div class="bg-light border-right sidebar sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <div class="sidebar-heading pointer bg-red text-light notification-toggle d-flex justify-content-between align-items-center"
                         aria-label="notification-toggle">Friend requests
                        <i class="fa fa-angle-left fa-lg"></i>
                    </div>
                    @if(Auth::check())
                        @foreach($friendsRequests as $friendsRequest)
                            <a
                                    class="list-group-item bg-light d-flex justify-content-between">{{ $friendsRequest->user->username }}

                                <a href="/friends/add/{{ $friendsRequest->user_id }}" class="btn btn-success">
                                    accept
                                </a>
                                <a href="/friends/decline/{{ $friendsRequest->user_id }}" class="btn btn-danger">
                                    decline
                                </a>

                            </a>


                        @endforeach

                    @else
                        <a class="list-group-item list-group-item-action bg-light nobordertop ">register your key to see
                            when
                            someone sends you a message</a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{--main menu--}}
    <div class="d-flex wrapper" id="wrapper-menu">
        <div class="sidebar-container">
            <div class="bg-light border-right sidebar sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <div class="sidebar-heading pointer bg-red text-light menu-toggle d-flex justify-content-between align-items-center"
                         aria-label="menu-toggle">{{ config('app.name', 'Laravel') }}
                        <i class="fa fa-angle-left fa-lg"></i>
                    </div>
                    <a class="list-group-item nobordertop list-group-item-action bg-light menu-toggle-2 d-flex justify-content-between align-items-center"
                       aria-label="menu-toggle-2" onclick="toggleMenu(2)">Messages<i class="fa fa-angle-right fa-lg"
                                                                                     aria-hidden="true"></i></a>
                    <a class="list-group-item list-group-item-action bg-light menu-toggle-3 d-flex justify-content-between align-items-center"
                       aria-label="menu-toggle-3" onclick="toggleMenu(3)">account<i class="fa fa-angle-right fa-lg"
                                                                                    aria-hidden="true"></i></a>

                    <a href="/keys/" class="list-group-item list-group-item-action bg-light">Keys</a>
                    <a href="/documentation/" class="list-group-item list-group-item-action bg-light">Documentation</a>


                </div>
                @if(Auth::check())
                    <div class="list-group list-group-flush fixed-bottom">

                        <div class="navbar  list-group-item d-flex justify-content-between">

                            <button class="btn-nostyle" type="button" aria-label="menu-tog">
                                <a href="/settings">
                                    <i class="material-icons">settings</i>
                                </a>
                            </button>

                            <button class="btn-nostyle" type="button" aria-label="menu-tog">
                                <div class="" onclick="toggleMenu(4)">
                                    <i class="material-icons">account_box</i>
                                </div>
                            </button>

                            <button class="btn-nostyle" type="button" aria-label="menu-tog"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                <div class="">
                                    <i class="material-icons">power_settings_new</i>
                                </div>
                            </button>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{--friends menu--}}
    <div class="d-flex wrapper" id="wrapper-friends">
        <div class="sidebar-container">
            <div class="bg-light border-right sidebar sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <div class="sidebar-heading pointer bg-red text-light friends-toggle d-flex justify-content-between align-items-center"
                         aria-label="menu-toggle">Friends
                        <i class="fa fa-angle-left fa-lg"></i>
                    </div>
                    @if( Auth::check() )
                        <a class="list-group-item list-group-item-action bg-light nobordertop ">
                            <input id="addfriend" type="text" class="form-control" name="friend">
                        </a>
                        <div class="userlist">
                            @foreach($friends as $friend)
                                <a href="/messages/create/{{ $friend->user->id }}"
                                   class="list-group-item list-group-item-action bg-light">{{ $friend->user->username }}</a>
                            @endforeach
                        </div>
                    @else
                        <a class="list-group-item list-group-item-action bg-light">register your key to search for
                            others</a>


                    @endif

                </div>
            </div>
        </div>
    </div>


    {{--message menu--}}
    <div class="d-flex wrapper" id="wrapper-2">
        <div class="sidebar-container">
            <div class="bg-light sub-sidebar border-right sidebar sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <div class="pointer  sidebar-heading bg-red text-light menu-toggle-2 d-flex justify-content-between align-items-center"
                         aria-label="menu-toggle-2" onclick="toggleMenu(2)">Messages
                        <i class="fa fa-angle-left fa-lg"></i>
                    </div>
                    <a href="/messages/" class="list-group-item list-group-item-action bg-light">All messages</a>
                    <a href="/messages/create" class="list-group-item list-group-item-action bg-light">send message</a>
                </div>
            </div>
        </div>
    </div>

    {{--account menu--}}
    <div class="d-flex wrapper" id="wrapper-3">
        <div class="sidebar-container">
            <div class="bg-light sub-sidebar border-right sidebar sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <div class="pointer  sidebar-heading bg-red text-light menu-toggle-2 d-flex justify-content-between align-items-center"
                         aria-label="menu-toggle-2" onclick="toggleMenu(3)">Keys
                        <i class="fa fa-angle-left fa-lg"></i>
                    </div>
                    @if( Auth::check() )
                        <a href="{{ url('/logout') }}"
                           class="list-group-item list-group-item-action bg-light">logout</a>
                        <a href="/settings" class="list-group-item list-group-item-action bg-light">settings</a>

                    @else
                        <a href="/login" class="list-group-item list-group-item-action bg-light">login</a>
                        <a href="/register" class="list-group-item list-group-item-action bg-light">register</a>

                    @endif

                </div>

            </div>
        </div>
    </div>


    {{--add friend menu--}}
    @foreach($users as $user)
        <div class="d-flex wrapper" id="wrapperuser-{{ $user->id }}">
            <div class="sidebar-container">
                <div class="bg-light sub-sidebar border-right sidebar sidebar-wrapper">
                    <div class="list-group list-group-flush">
                        <div class="pointer  sidebar-heading bg-red text-light menu-toggle-5 d-flex justify-content-between align-items-center"
                             aria-label="menu-toggle-" onclick="toggleUserMenu({{ $user->id }})">
                            User: {{ $user->username }}
                            <i class="fa fa-angle-left fa-lg"></i>
                        </div>
                        @if( Auth::check() )

                            <a href="/messages/create/{{ $user->id }}"
                               class="list-group-item list-group-item-action bg-light">Send message
                                to: {{ $user->username }}</a>



                            <a href="/friends/add/{{ $user->id }}"
                               class="list-group-item list-group-item-action bg-light">send frend request
                                to: {{ $user->username }}</a>


                        @else
                            <a class="list-group-item list-group-item-action bg-light">register your key to search for
                                others</a>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endforeach


</nav>

{{--navbar--}}
<main id="page-content" class="page-content w-100">
    <nav class="noselect navbar navbar-dark bg-red text-light col-12 d-flex justify-content-between">
        <div class="d-flex justify-content-start">
            <div>
                <button class="navbar-toggler menu-toggle" type="button" aria-label="menu-toggle">
                    <i class="material-icons">menu</i>
                </button>
            </div>

            <div class="border-left border-right">
                <button class="navbar-toggler friends-toggle" type="button" aria-label="friends-toggle">
                    <i class="material-icons">account_box</i>
                </button>
            </div>


            <div class="d-none d-md-block">
                <a href="/" class="navbar-brand">{{ config('app.name', 'Laravel') }} <strong class="size1">1.3
                        encrypted</strong>
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-end">

            <div style=" text-transform: capitalize">
                @if( Auth::check() )
                    <a href="/" class="navbar-brand">{{ Auth::user()->username }}</a>
                @endif

            </div>
            <div class="@guest
                    d-none d-md-block
                    @endauth
                    border-left border-right">
                <button class="navbar-toggler search-toggle" type="button" aria-label="search-toggle">
                    <i class="material-icons">search</i>
                </button>
            </div>
            <div class="@guest
                    d-none d-md-block
                    @endauth">
                <button class="navbar-toggler notification-toggle" type="button" aria-label="notification-toggle">
                    <i class="material-icons md-dark">
                        notification_important
                    </i>
                </button>
            </div>


        </div>
    </nav>
    <div class="">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</main>


@yield('scripts')

<script>
    search('addfriend');
    search('search');

    function search(input) {
        $(document).ready(function () {
            $("#" + input).on("keyup", function () {
                var value = $(this).val().toLowerCase();
                console.log(value);
                $(".userlist a").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    }

    //this is to close everything
    $(document).ready(function () {
        $(document).click(function (event) {
            var clickover = $(event.target);
            var _opened = $(".wrapper").hasClass("toggled");
            if (_opened === true
                && !clickover.parents().hasClass('sidebar')
                && !clickover.hasClass('sidebar')
                && !clickover.parents().hasClass('navbar-toggler')
                && !clickover.hasClass('navbar-toggler')) {

                $(".wrapper").removeClass("toggled");

                $(".sidebar-container").removeClass("sidebar-color");
            }
        });
    });

    //these are all of the menus they correspond to the name of the icon
    toggleSidebar('menu');
    toggleSidebar('friends');
    toggleSidebar('search');
    toggleSidebar('notification');

    //this id to open the sidebar menu
    function toggleSidebar(menu) {

        $("." + menu + "-toggle").click(function (e) {
            if (!$(".wrapper").hasClass("toggled") || $("#wrapper-" + menu).hasClass("toggled")) {
                e.preventDefault();
                $("#wrapper-" + menu).toggleClass("toggled");
                $(".sidebar-container").toggleClass("sidebar-color");
            } else {
                $(".wrapper").removeClass("toggled");
                $(".sidebar-container").removeClass("sidebar-color");
            }

        });
    }

    //this function is for openig deeper levels in sidebars
    function toggleMenu(menu) {
        $("#wrapper-" + menu).toggleClass("toggled");
        $(".sidebar-container").addClass("sidebar-color");
    }

    //this function is for openig user deeper levels in sidebars
    function toggleUserMenu(usermenu) {
        $("#wrapperuser-" + usermenu).toggleClass("toggled");
        $(".sidebar-container").addClass("sidebar-color");
    }

</script>
</body>
</html>