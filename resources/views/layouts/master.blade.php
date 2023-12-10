<!doctype html>
<html lang="en">

@include('includes.head')

    <body data-layout="detached" data-topbar="colored">
        <div class="container-fluid">
            <!-- Begin page -->
            <div id="layout-wrapper">

                @include('includes.sidebar')
                <!-- Start right Content here -->
                <!-- ============================================================== -->
                <div class="main-content">

                    @yield('content')

                    @include('includes.footer')

                </div>
            <!-- end main content-->


        @include('includes.scripts')
    </body>
</html>
