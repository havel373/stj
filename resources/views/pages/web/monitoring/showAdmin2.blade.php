<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">
                Detail Monitoring
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">No SPK : {{$monitoring?->schedule?->no_spk}} </small>
                <!--end::Description-->
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="javascript:;" onclick="load_list(1);" class="btn btn-sm btn-warning">
                Back
            </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<div class="card card-flush pt-3 mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Detail :</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="kt_table_customers_events">
                <!--begin::Table body-->
                <tbody>
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">No Invoice</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->nomor_invoice}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Keterangan Invoice</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->keterangan_invoice}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Normal</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->normal}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Multi Drop</a> :
                        <a class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->multi_drop}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Lain - Lain</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->lain_lain}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Total</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->total }}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">PPH 23</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->pph23}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">PPN</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->ppn}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Nominal Invoice</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->nominal_invoice}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Tanggal Tanda Terima Invoice</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->tanggal_tanda_terima_invoice}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Keterangan</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring->keterangan}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>