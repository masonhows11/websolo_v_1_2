<!DOCTYPE html>
<html lang="fa" direction="rtl" dir="rtl" style="direction:rtl">
<head>
    <title>@yield('admin_title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="#">
    @include('admin.include.styles')
</head>
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            {{--start header --}}
            @include('admin.include.header')
            {{--end header --}}
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                {{--start sidebar --}}
                @include('admin.include.sidebar')
                {{--end sidebar --}}
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        {{-- start breadcrumb --}}
                        @include('admin.include.breadcrumb')
                          {{-- end breadcrumb --}}
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                <!-- start main content -->
                                @yield('admin_main')
                                <!-- end main content -->
                            </div>
                        </div>
                    </div>
                    @include('admin.include.footer')
                </div>
            </div>
        </div>
    </div>
   @include('admin.include.scripts')
   @stack('dash_custom_scripts')
</body>
</html>
