<x-web-layout title="Driver">
    <div id="content_list">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">
                        Master
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Driver</small>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-1">
                    <!--begin::Wrapper-->
                    <div class="me-4">
                        <!--begin::Menu-->
                        <a href="javascript:;" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            Filter
                        </a>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <form id="content_filter">
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fw-bold">Status Karyawan:</label>
                                        <!--begin::Input-->
                                        <div>
                                            <select name="status_karyawan" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
                                                <option value="">Pilih</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="resign">Resign</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="button" onclick="load_list(1);" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        
                        <!--end::Menu-->
                    </div>
                    <!--end::Wrapper-->
                    @if(Auth::User()->role == 'z' || Auth::user()->role == 'b' || Auth::user()->role == 'a')
                    <div class="me-4">
                        <a href="{{route('export.driver')}}" class="btn btn-sm btn-flex btn-success btn-active-primary fw-bolder">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="excel"><path fill="none" stroke="#303c42" stroke-linecap="round" stroke-linejoin="round" d="M13.5.5.5 3v18l13 2.5zM13.5 3.5h10v17h-10"></path><path fill="none" stroke="#303c42" stroke-linecap="round" stroke-linejoin="round" d="M13.5 5.5h3v1h-3zM18.5 5.5h3v1h-3zM13.5 8.5h3v1h-3zM18.5 8.5h3v1h-3zM13.5 11.5h3v1h-3zM18.5 11.5h3v1h-3zM13.5 14.5h3v1h-3zM18.5 14.5h3v1h-3zM13.5 17.5h3v1h-3zM18.5 17.5h3v1h-3zM4.5 8.5l4 8M4.5 16.5l4-8"></path></svg>
                            </span>
                            <!--end::Svg Icon-->
                            Export Excel
                        </a>
                    </div>
                    @endif
                    <div class="me-4">
                        <!--begin::Button-->
                        <a href="javascript:;" onclick="load_list(1);" class="btn btn-sm btn-info">
                            Refresh
                        </a>
                    </div>
                    <!--begin::Button-->
                    <a href="javascript:;" onclick="load_input('{{route('driver.create')}}');" class="btn btn-sm btn-primary">
                        Create
                    </a>
                    <!--end::Button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="card card-flush">
            <div class="card-body pt-0">
                <div class="mt-5 px-3 pt-4">
                    <div id="list_result"></div>
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <div id="content_input"></div>
    @section('custom_js')
        <script type="text/javascript">
            load_list(1);
        </script>
    @endsection
</x-web-layout>