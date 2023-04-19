@include('header.header')
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

        @include('header.top')
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container"
                            class="app-container container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div
                                class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    <div class="alert alert-danger shadow-lg">
                                        @isset($Desc)
                                            {{ $Desc }}
                                        @endisset

                                    </div>
                                </h1>

                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->

                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                    <div id="kt_app_content"
                        class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container"
                            class="app-container container-fluid">
                            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">



                                @isset($Page)
                                    @include($Page)
                                @endisset




                            </div>
                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                @include('scripts.scripts')
