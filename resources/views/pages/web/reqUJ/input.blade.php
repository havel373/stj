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
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Uang Jalan</small>
                <!--end::Description-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                @if ($data->id)
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Update</small>
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">{{$data->no_pol}}</small>
                @else
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Create</small>
                @endif
                <!--end::Description-->
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="javascript:;" onclick="load_list(1);" class="btn btn-sm btn-primary">
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
                                        {{-- <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tanggal</label>
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Customer</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="id_schedule" id="id_schedule" class="form-control form-control-solid">
                                                <option value="">Pilih Customer</option>
                                                @foreach ($customer as $item)
                                                <option value="{{$item->id}}" {{$item->id == $data->id_schedule ? 'selected' : ''}}>{{$item->nama_customer}}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        @if($data?->schedule->status == 0)
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Posisi Unit</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="posisi_unit" name="posisi_unit" class="form-control form-control-solid" value="{{$data->posisi_unit}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lokasi Muat</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="lokasi_muat" name="lokasi_muat" class="form-control form-control-solid" value="{{$data?->schedule?->muat}}" readonly />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tujuan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="tujuan" name="tujuan" class="form-control form-control-solid" value="{{$data?->schedule?->bongkar}}" readonly />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto KM Awal</label>
                                        <div class="mb-5">
                                            <input type="file" class="form-control form-control-solid" id="foto_km_awal" name="foto_km_awal"  value="{{$data->foto_km_awal}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Balok Bensin</label>
                                        <div class="mb-5">
                                            <input type="file" class="form-control form-control-solid" id="balok_bensin_awal" name="balok_bensin_awal" value="{{$data->balok_bensin_awal}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Customer</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="customer" name="customer" class="form-control form-control-solid" value="{{$data?->schedule?->customer?->nama_customer}}" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">KM Awal</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="km_awal" name="km_awal" class="form-control form-control-solid" value="{{$data->km_awal}}" />
                                        </div>
                                        <!--end::Input group-->
                                        @endif
                                        @if($data?->schedule->status == 3)
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">KM Akhir</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="km_akhir" name="km_akhir" class="form-control form-control-solid" value="{{$data->km_akhir}}" />
                                        </div>
                                        @endif
                                        @if($data?->schedule->status == 0)
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Uang Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="uang_jalan" name="uang_jalan" class="form-control form-control-solid" value="{{$data->uang_jalan ? $data->uang_jalan : 0}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sisa Uang Jalan Kemarin</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="sisa_uang_jalan_kemarin" name="sisa_uang_jalan_kemarin" class="form-control form-control-solid" value="{{$data->sisa_uang_jalan_kemarin ? $data->sisa_uang_jalan_kemarin : 0}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Total Uang Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="total_uang_jalan" name="total_uang_jalan" class="form-control form-control-solid" value="{{$data->total_uang_jalan}}" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                        <input type="hidden" name="status" id="" value="1">
                                        @endif
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Button-->
                                <div class="mb-0">
                                    {{-- @if ($data->id) --}}
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('reqUJ.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    {{-- @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('reqUJ.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
                                    @endif --}}
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
    select2('id_driver');
    select2('id_customer');
    select2('id_unit');
    number_only("km_awal");
    number_only("km_akhir");
    ribuan("uang_jalan");
    ribuan("sisa_uang_jalan_kemarin");
    function formatWithCommas(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    $(document).ready(function () {
        $('#sisa_uang_jalan_kemarin, #uang_jalan').on('input', function () {
            const valSisaUangJalan = parseNumericValue($('#sisa_uang_jalan_kemarin').val());
            const uangJalan = parseNumericValue($('#uang_jalan').val());
            const totalUangJalan = uangJalan - valSisaUangJalan;

            // Format the total with commas
            const formattedTotalUangJalan = formatWithCommas(totalUangJalan);

            $('#total_uang_jalan').val(formattedTotalUangJalan);
        });

        // Initialize the calculation when the page loads
        $('#sisa_uang_jalan_kemarin, #uang_jalan').trigger('input');
    });

    // Function to remove commas and convert to a numeric value
    function parseNumericValue(value) {
        return parseFloat(value.replace(/,/g, '')) || 0;
    }

    // Format inputs with commas when they lose focus
    $('#uang_jalan, #sisa_uang_jalan_kemarin').on('blur', function () {
        const id = $(this).attr('id');
        const value = $(this).val();
        const formattedValue = formatWithCommas(parseNumericValue(value));

        $(this).val(formattedValue);
    });
</script>