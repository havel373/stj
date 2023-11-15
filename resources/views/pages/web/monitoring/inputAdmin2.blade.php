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
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Monitoring</small>
                <!--end::Description-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Update</small>
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
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
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <form id="form_input">
                            <!--begin::Wrapper-->
                            <div class="mb-0">
                                <!--begin::Row-->
                                <div class="row gx-12 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nomor Invoice</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="nomor_invoice" name="nomor_invoice" class="form-control form-control-solid" value="{{$monitoring->nomor_invoice}}" />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tanggal PO</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="tanggal_po" name="tanggal_po" class="form-control form-control-solid" value="{{$monitoring?->schedule?->tanggal}}" readonly />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nomor PO</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="nomor_po" name="nomor_po" class="form-control form-control-solid" value="{{$monitoring->nomor_po}}" />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Customer</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="customer" name="customer" class="form-control form-control-solid" value="{{$monitoring->customer}}" />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tujuan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="tujuan" name="tujuan" class="form-control form-control-solid" value="{{$monitoring?->schedule?->bongkar}}" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Unit</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="unit" name="unit" class="form-control form-control-solid" value="{{$monitoring?->schedule?->unit?->type_unit}}" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">No Pol</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="no_pol" name="no_pol" class="form-control form-control-solid" value="{{$monitoring?->schedule?->unit?->no_pol}}" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Rate / Price</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="rate" name="rate" class="form-control form-control-solid" value="{{$monitoring->rate}}" />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Pilihan Rekening Tujuan</label>
                                        <!--begin::Input group-->
                                        <select name="pilihan_rekening" id="pilihan_rekening" class="form-control form-control-solid">
                                            <option value="">Pilih Rekening</option>
                                            <option value="stj">STJ</option>
                                            <option value="bml">BML</option>
                                        </select>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tanggal Jatuh Tempo</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="date" id="jatuh_tempo" name="jatuh_tempo" class="form-control form-control-solid" value="{{$monitoring->jatuh_tempo}}" />
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">VAT 11%</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="vat" name="vat" class="form-control form-control-solid" value="" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-12">
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Grand Total</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="grand_total" name="grand_total" class="form-control form-control-solid" value="" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Button-->
                                <div class="mb-0">
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('monitoringJulita.update',$monitoring->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                </div>
                                <!--end::Button-->
                            </div>
                            <!--end::Wrapper-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->
<script>
    function ribuanFormat(number) {
        var formatted = number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return formatted.endsWith('.00') ? formatted.split('.')[0] : formatted;
    }
    
    function calculate() {
        var rate = parseFloat($('#rate').val().replace(/,/g, '')) || 0;
        var vat = 0.11 * rate;
        var grandTotal = rate + vat;

        $('#vat').val(ribuanFormat(vat.toFixed(2)));
        $('#grand_total').val(ribuanFormat(grandTotal.toFixed(2)));
    }

    function ribuan(obj) {
        $('#' + obj).keyup(function (event) {
            if (event.which >= 37 && event.which <= 40) return;
            $(this).val(function (index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
            calculate();
        });
    }
    $('#rate').on('input', calculate);
    calculate();
    ribuan('rate');
    ribuan('grand_total');
    ribuan('vat');
</script>