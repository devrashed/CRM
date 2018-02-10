@include('admin.partial.header')

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        @include('admin.partial.top-nav')
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
            @include('admin.partial.sidebar')
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
             @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@include('admin.partial.footer')