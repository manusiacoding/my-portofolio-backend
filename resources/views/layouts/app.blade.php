<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Dashboard | @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/avatar.ico') }}" type="image/x-icon">

    @include('components.css')
    @yield('css')
</head>

<body>
    <script src="{{ asset('assets/js/initTheme.js') }}"></script>
    <div id="app">

        @include('components.sidebar')

        <div id="main" class="layout-navbar navbar-fixed">

            @include('components.navbar')

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-12 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('home.index') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            @yield('title')
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>

                @include('components.footer')
            </div>
        </div>
    </div>

    @include('components.js')

    @yield('js')
    <script>
        $('.logout').on('click', function(){
            $('#btntrigger').click();
        });
    </script>
</body>

</html>
