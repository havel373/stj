<x-web-layout title="Dashboard">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
                            <!--end::Svg Icon-->
                            <div class="text-inverse-body fw-bolder fs-2 mb-2 mt-5">{{$new}}</div>
                            <div class="fw-bold text-inverse-body fs-7">Jadwal Baru</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
                            <!--end::Svg Icon-->
                            <div class="text-inverse-dark fw-bolder fs-2 mb-2 mt-5">{{$reqUangJalan}}</div>
                            <div class="fw-bold text-inverse-dark fs-7">Request Uang Jalan</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
                            <!--end::Svg Icon-->
                            <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{$ongoing}}</div>
                            <div class="fw-bold text-inverse-warning fs-7">Sedang Berjalan</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-pie.svg-->
                            <!--end::Svg Icon-->
                            <div class="text-inverse-info fw-bolder fs-2 mb-2 mt-5">{{$complete}}</div>
                            <div class="fw-bold text-inverse-info fs-7">Selesai</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
                {{-- <div class="col-xl-3">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-pie.svg-->
                            <!--end::Svg Icon-->
                            <div class="text-inverse-info fw-bolder fs-2 mb-2 mt-5">{{$cancel}}</div>
                            <div class="fw-bold text-inverse-info fs-7">Batal</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div> --}}
            </div>
        </div>
    </div>
</x-web-layout>