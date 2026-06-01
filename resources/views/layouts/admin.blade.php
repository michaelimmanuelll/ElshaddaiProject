<!DOCTYPE html>
<html lang="id" data-bs-theme="light" data-scheme="navy">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>Sistem Data Jemaat - GPdI El-Shaddai</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/logo-gereja.jpeg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nifty.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo-purpose/demo-icons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   @stack('styles')
</head>
</head>

<body class="out-quart">
    <div id="root" class="root mn--min tm--expanded-hd">

        <section id="content" class="content">
            
            @yield('content')

            <footer class="mt-auto">
                <div class="content__boxed">
                    <div class="content__wrap py-3 py-md-1 d-flex flex-column flex-md-row align-items-md-center">
                        <div class="text-nowrap mb-4 mb-md-0">Copyright &copy; 2026 <a href="#" class="ms-1 btn-link fw-bold">GPdI El-Shaddai Makassar</a></div>
                    </div>
                </div>
            </footer>
        </section>

        <header class="header">
            <div class="header__inner">
                <div class="header__brand">
                    <div class="brand-wrap">
                            <img src="{{ asset('assets/img/logo-gereja.jpeg') }}" alt="Logo GPdI El-Shaddai" class="logo rounded-circle shadow-sm" style="width: 45px; height: 45px; object-fit: cover;">
                        <div class="brand-title">El-Shaddai</div>
                    </div>
                </div>

                <div class="header__content">
                    <div class="header__content-start">
                        <button type="button" class="nav-toggler header__btn btn btn-icon btn-sm" aria-label="Nav Toggler">
                            <i class="demo-psi-list-view"></i>
                        </button>
                    </div>

                    <div class="header__content-end">
                        <div class="dropdown">
                            <button class="header__btn btn btn-icon btn-sm" type="button" data-bs-toggle="dropdown">
                                <i class="demo-psi-male"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end w-md-450px">
                                <div class="d-flex align-items-center border-bottom px-3 py-2">
                                    <div class="flex-shrink-0">
                                        <img class="img-sm rounded-circle" src="{{ asset('assets/img/profile-photos/1.png') }}" alt="Profile Picture" loading="lazy">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">Administrator</h5>
                                        <span class="text-body-secondary fst-italic">admin@gpdielshaddai.com</span>
                                    </div>
                                </div>
                                <div class="list-group list-group-borderless h-100 py-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" 
                                        class="list-group-item list-group-item-action" 
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="demo-pli-unlock fs-5 me-2"></i> Logout
                                    </a>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <nav id="mainnav-container" class="mainnav">
            <div class="mainnav__inner">
                <div class="mainnav__top-content scrollable-content pb-5">
                    
                    <div class="mainnav__categoriy py-3">
                        <h6 class="mainnav__caption mt-0 fw-bold">Menu Utama</h6>
                        <ul class="mainnav__menu nav flex-column">


                            <li class="nav-item">
                                <a href="{{ url('/jemaat') }}" class="nav-link">
                                    <i class="demo-pli-receipt-4 fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Data Jemaat</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/jemaat/create') }}" class="nav-link">
                                    <i class="demo-pli-add-user fs-5 me-2"></i>
                                    <span class="nav-label ms-1">Tambah Jemaat</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <script src="{{ asset('assets/vendors/popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/nifty.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @stack('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    </script>
    @endif

</body>
</html>