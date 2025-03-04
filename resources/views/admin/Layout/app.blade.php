<!doctype html>
<html lang="en">
  <!--begin::Head-->
    @include('admin.Layout.head')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">

      <!--begin::Header-->
        @include('admin.Layout.header')
      <!--end::Header-->

      <!--begin::Sidebar-->
        @include('admin.Layout.sidebar')
      <!--end::Sidebar-->

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">@yield('mini title')</h3></div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            @yield('content')
        </div>
        
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

      <!--begin::Footer-->
        @include('admin.Layout.footer')
      <!--end::Footer-->
      
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    @include('admin.Layout.script')
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
