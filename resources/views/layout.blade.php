<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SOFTWARE WEB - YOUR DREAMS, OUR MISSION</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('fontawesome-5.15.3/css/all.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- dataTable  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body>

    <div class="HeroImage">
        <div class="Glass">
            <div class="wrapper">
                <div id="mySidenav" class="sidenav">

                    <a href="/dashboard" class="SidebarTextIcons {{'dashboard' == request()->path() ? 'active' : ''}}">
                        <i class="fa fa-tachometer-alt" aria-hidden="true"></i>
                        <span class="SideBarText">Dashboard</span>
                    </a>
                    <a href="/manage_clients" class="SidebarTextIcons {{'clients' == request()->path() ? 'active' : ''}}">
                        <i class="fa fa-address-book" aria-hidden="true"></i>
                        <span class="SideBarText">Clients</span>

                    </a>
                    <a href="/manage_students" class="SidebarTextIcons {{'students' == request()->path() ? 'active' : ''}}">
                        <i class="fa fa-user-graduate" aria-hidden="true"></i>
                        <span class="SideBarText">Students</span>
                    </a>
                    <a href="/new_order" class="SidebarTextIcons {{'new_order' == request()->path() ? 'active' : ''}}">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                        <span class="SideBarText">New Order</span>
                    </a>
                    <a href="/manage_orders" class="SidebarTextIcons {{'orders' == request()->path() ? 'active' : ''}}">
                        <i class="fa fa-book-open" aria-hidden="true"></i>
                        <span class="SideBarText">Manage Orders</span>
                    </a>
                </div>
                <div class="my_content">
                    <div style="padding-left: 75px;">
                        @yield('content')
                    </div>
                    
                </div>
            </div>
        </div>
        <footer>© 2021 Software Web. All Rights Reserved. <a href="#">Software Web</a></footer>
    </div>


    
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table1').DataTable( {
                pageLength : 5,
                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
                responsive: true,
            } );
        } );
    </script>


</body>
</html>