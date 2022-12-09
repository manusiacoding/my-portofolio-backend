<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>My Portofolio | @yield('title')</title>

    @include('components.css')
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <div class="container-scroller">
        @include('components.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            {{-- @include('components.navbar', ['repos' => $datarepos]) --}}
            @include('components.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                @include('components.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    @include('components.js')
    @yield('js')
    {{-- @vite('resources/js/app.js') --}}
    <script>
        $('.logout').on('click', function(){
            $('.btnlogout').click();
        });
    </script>
</body>

</html>
