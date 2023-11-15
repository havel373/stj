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
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Schedule</small>
                <!--end::Description-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                @if ($data->id)
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Update</small>
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">{{$data->id}}</small>
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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Posisi Unit</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="posisi_unit" name="posisi_unit" class="form-control form-control-solid" readonly value="{{$data->posisi_unit}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Lokasi Muat</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="lokasi_muat" name="lokasi_muat" class="form-control form-control-solid" readonly value="{{$data->lokasi_muat}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tujuan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="tujuan" name="tujuan" class="form-control form-control-solid" readonly value="{{$data->tujuan}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto KM Awal</label>
                                        <div class="mb-5">
                                            <img src="{{asset($data->ImageKmAwal)}}" alt="" style="height:150px;width:200px;">
                                            <a target="_blank" href="{{asset($data->imageKmAwal)}}" >Lihat Foto</a>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Balok Bensin</label>
                                        <div class="mb-5">
                                            <img src="{{asset($data->ImageBensin)}}" alt="" style="height:150px;width:200px;">
                                            <a target="_blank" href="{{asset($data->ImageBensin)}}" >Lihat Foto</a>
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">KM Awal</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="km_awal" name="km_awal" class="form-control form-control-solid" readonly value="{{$data->km_awal}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">KM Akhir</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="km_akhir" name="km_akhir" class="form-control form-control-solid" readonly value="{{$data->km_akhir}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sisa Uang Jalan Kemarin</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="sisa_uang_jalan_kemarin" name="sisa_uang_jalan_kemarin" class="form-control form-control-solid" readonly value="{{$data->sisa_uang_jalan_kemarin}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Total Uang Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="total_uang_jalan" name="total_uang_jalan" class="form-control form-control-solid" readonly value="{{$data->total_uang_jalan}}" />
                                        </div>
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Uang Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="uang_jalan" name="uang_jalan" class="form-control form-control-solid" value="{{$data->uang_jalan}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="status" id="status" class="form-control form-control-solid">
                                                <option value="disetujui">Setuju</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Button-->
                                <div class="mb-0">
                                    {{-- @if ($data->id) --}}
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('uangJalan.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    {{-- @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('uangJalan.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
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
    ribuan('uang_jalan');
    function formatWithCommas(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    $(document).ready(function () {
        const uangJalanValue = $('#uang_jalan').val();
        const formattedUangJalanValue = formatWithCommas(uangJalanValue);
        $('#uang_jalan').val(formattedUangJalanValue);

        $('#uang_jalan').on('keyup', function () {
            const uangJalan = parseNumericValue(this.value);
            const valSisaUangJalan = parseNumericValue($('#sisa_uang_jalan_kemarin').val());
            const totalUangJalan = uangJalan - valSisaUangJalan;
            const formattedTotalUangJalan = formatWithCommas(totalUangJalan);

            $('#total_uang_jalan').val(formattedTotalUangJalan);
        });
    });

    function parseNumericValue(value) {
        return parseFloat(value.replace(/,/g, '')) || 0;
    }
</script>