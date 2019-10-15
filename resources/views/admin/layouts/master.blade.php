@include('admin.layouts.header')
@include('admin.layouts.menu')
@include('admin.layouts.sidebar')
<div class="content-wrapper">
    <div class="content-header">
        @yield('content-header')
    </div>
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>        
</div>
@include('admin.layouts.footer')