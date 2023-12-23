<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body class="sb-nav-fixed">
    @include('layout.partials.navbar')
    <div id="layoutSidenav">
        @include('layout.partials.sidenav')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('mainContent')
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                @include('layout.partials.footer')
            </footer>
        </div>
    </div>
    @include('layout.partials.scripts')

</body>

</html>
