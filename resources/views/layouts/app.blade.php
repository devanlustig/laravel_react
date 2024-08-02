<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tambahkan stylesheet Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        /* CSS untuk mengatur tinggi konten */
        .content-container {
            height: calc(100vh - 56px); /* 56px adalah ketinggian navbar */
            overflow-y: auto; /* Tambahkan scrollbar vertikal jika konten terlalu panjang */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Brand</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Menampilkan username -->
                <li class="nav-item">
                    @if(auth()->user())
                    <span class="navbar-text mr-3">Hello, {{ auth()->user()->fullname }}</span>
                    @else
                    <span class="navbar-text mr-3"></span>
                    @endif
                </li>
                <!-- Tombol logout -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 text-center text-md-left">
                <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-home"></i> <span class="d-none d-md-inline">Dashboard</span> </a>
                <div class="collapse" id="menu1" data-parent="#sidebar">
                    <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
                    <div class="collapse" id="menu1sub1" data-parent="#menu1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item">Subitem e.1</a>
                            <a href="#" class="list-group-item">Subitem e.2</a>
                        </div>
                    </div>
                    <a href="#menu1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 2</a>
                    <div class="collapse" id="menu1sub2" data-parent="#menu1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 1 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 2 b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 4 d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 5 e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>
                        </div>
                    </div>
                    <a href="#" class="list-group-item">Subitem 3</a>
                </div>

                <a href="{{ route('posts.index') }}" class="list-group-item d-inline-block collapsed"><i class="fa fa-film"></i> <span class="d-none d-md-inline">POSTS</span></a>

                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-book"></i> <span class="d-none d-md-inline">Item 3 </span></a>
                <div class="collapse" id="menu3" data-parent="#sidebar">
                    <a href="#" class="list-group-item" data-parent="#menu3">3.1</a>
                    <a href="#menu3sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">3.2 </a>
                    <div class="collapse" id="menu3sub2">
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 b</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">3.2 c</a>
                    </div>
                    <a href="#" class="list-group-item" data-parent="#menu3">3.3</a>
                </div>
               
                
            </div>
        </div>
        <main class="col-md-10 float-left col px-5 pl-md-2 pt-2 main">
            <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="text-dark fa fa-navicon fa-lg py-2 p-1"></i></a>
             @yield('content')
        </main>
    </div>
</div>

<style>
 #sidebar {
    overflow: hidden;
    z-index: 3;
}
#sidebar .list-group {
    min-width: 400px;
    background-color: #333;
    min-height: 100vh;
}
#sidebar i {
    margin-right: 6px;
}

#sidebar .list-group-item {
    border-radius: 0;
    background-color: #333;
    color: #ccc;
    border-left: 0;
    border-right: 0;
    border-color: #2c2c2c;
    white-space: nowrap;
}

/* highlight active menu */
#sidebar .list-group-item:not(.collapsed) {
    background-color: #222;
}

/* closed state */
#sidebar .list-group .list-group-item[aria-expanded="false"]::after {
  content: " \f0d7";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 5px;
}

/* open state */
#sidebar .list-group .list-group-item[aria-expanded="true"] {
  background-color: #222;
}
#sidebar .list-group .list-group-item[aria-expanded="true"]::after {
  content: " \f0da";
  font-family: FontAwesome;
  display: inline;
  text-align: right;
  padding-left: 5px;
}

/* level 1*/
#sidebar .list-group .collapse .list-group-item,
#sidebar .list-group .collapsing .list-group-item  {
  padding-left: 20px;
}

/* level 2*/
#sidebar .list-group .collapse > .collapse .list-group-item,
#sidebar .list-group .collapse > .collapsing .list-group-item {
  padding-left: 30px;
}

/* level 3*/
#sidebar .list-group .collapse > .collapse > .collapse .list-group-item {
  padding-left: 40px;
}

@media (max-width:768px) {
    #sidebar {
        min-width: 35px;
        max-width: 40px;
        overflow-y: auto;
        overflow-x: visible;
        transition: all 0.25s ease;
        transform: translateX(-45px);
        position: fixed;
    }
    
    #sidebar.show {
        transform: translateX(0);
    }

    #sidebar::-webkit-scrollbar{ width: 0px; }
    
    #sidebar, #sidebar .list-group {
        min-width: 1px;
        overflow: visible;
    }
    /* overlay sub levels on small screens */
    #sidebar .list-group .collapse.show, #sidebar .list-group .collapsing {
        position: relative;
        z-index: 1;
        width: 190px;
        top: 0;
    }
    #sidebar .list-group > .list-group-item {
        text-align: center;
        padding: .75rem .5rem;
    }
    /* hide caret icons of top level when collapsed */
    #sidebar .list-group > .list-group-item[aria-expanded="true"]::after,
    #sidebar .list-group > .list-group-item[aria-expanded="false"]::after {
        display:none;
    }
}

.collapse.show {
  visibility: visible;
}
.collapsing {
  visibility: visible;
  height: 0;
  -webkit-transition-property: height, visibility;
  transition-property: height, visibility;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.collapsing.width {
  -webkit-transition-property: width, visibility;
  transition-property: width, visibility;
  width: 0;
  height: 100%;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}

</style>

    <!-- Tambahkan script Bootstrap di sini -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>
</html>
