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
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Laporan Perjalanan</small>
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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Receh Di Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="receh_di_jalan" name="receh_di_jalan" class="form-control form-control-solid" value="{{$data->receh_di_jalan}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Receh Di Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_receh_di_jalan" name="foto_receh_di_jalan" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Parkir Resmi</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="parkir_resmi" name="parkir_resmi" class="form-control form-control-solid" value="{{$data->parkir_resmi}}" />
                                        </div>
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Parkir Resmi</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_parkir_resmi" name="foto_parkir_resmi" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Parkir Liar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="parkir_liar" name="parkir_liar" class="form-control form-control-solid" value="{{$data->parkir_liar}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Parkir Liar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_parkir_liar" name="foto_parkir_liar" class="form-control form-control-solid"/>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Helper</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="helper" name="helper" class="form-control form-control-solid" value="{{$data->helper}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Helper</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_helper" name="foto_helper" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">TKBM Muat</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="tkbm_muat" name="tkbm_muat" class="form-control form-control-solid" value="{{$data->tkbm_muat}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto TKBM Muat</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_tkbm_muat" name="foto_tkbm_muat" class="form-control form-control-solid"/>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">TKBM Bongkar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="tkbm_bongkar" name="tkbm_bongkar" class="form-control form-control-solid" value="{{$data->tkbm_bongkar}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto TKBM Bongkar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_tkbm_bongkar" name="foto_tkbm_bongkar" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Cheker</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="cheker" name="cheker" class="form-control form-control-solid" value="{{$data->cheker}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Cheker</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_cheker" name="foto_cheker" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Forklift</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="forklift" name="forklift" class="form-control form-control-solid" value="{{$data->forklift}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Forklift</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_forklift" name="foto_forklift" class="form-control form-control-solid"  />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Security</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="security" name="security" class="form-control form-control-solid" value="{{$data->security}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Security</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_security" name="foto_security" class="form-control form-control-solid"/>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Isi BBM / Solar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="bbm" name="bbm" class="form-control form-control-solid" value="{{$data->bbm}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Isi BBM / Solar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_bbm" name="foto_bbm" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Isi Saldo Etoll</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="etoll" name="etoll" class="form-control form-control-solid" value="{{$data->etoll}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Isi Saldo Etoll</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="file" id="foto_etoll" name="foto_etoll" class="form-control form-control-solid" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Total Pengeluaran</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="total_pengeluaran" name="total_pengeluaran" class="form-control form-control-solid" value="{{$data->total_pengeluaran}}" readonly />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sisa Uang Jalan</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="sisa_uang_jalan" name="sisa_uang_jalan" class="form-control form-control-solid" value="{{$data->sisa_uang_jalan == null ? $data?->schedule?->uangJalan?->total_uang_jalan - $data->total_pengeluaran : $data->sisa_uang_jalan - $data->total_pengeluaran}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Sisa Uang Jalan Kemarin</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="tel" id="sisa_uang_jalan_kemarin" name="sisa_uang_jalan_kemarin" class="form-control form-control-solid" value="{{$data->sisa_uang_jalan_kemarin}}" readonly/>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Button-->
                                <div class="mb-0">
                                    @if ($data->id)
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('laporanPerjalanan.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('laporanPerjalanan.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
                                    @endif
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
    ribuan('receh_di_jalan');
    ribuan('parkir_resmi');
    ribuan('parkir_liar');
    ribuan('helper');
    ribuan('tkbm_muat');
    ribuan('tkbm_bongkar');
    ribuan('cheker');
    ribuan('forklift');
    ribuan('security');
    ribuan('bbm');
    ribuan('etoll');
    ribuan('total_pengeluaran');
    ribuan('sisa_uang_jalan');
    function ribuanFormat(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function calculateSum() {
        const fieldsToSum = [
            'receh_di_jalan',
            'parkir_resmi',
            'parkir_liar',
            'helper',
            'tkbm_muat',
            'tkbm_bongkar',
            'cheker',
            'forklift',
            'security',
            'bbm',
            'etoll',
        ];

        let total = 0;
        fieldsToSum.forEach(function (fieldName) {
            const value = parseFloat($("#" + fieldName).val().replace(/[^\d.-]/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        const formattedTotal = ribuanFormat(total);
        $("#total_pengeluaran").val(formattedTotal);
        $("#total_pengeluaran_unformatted").val(total);

        const sisaUangJalan = parseFloat($("#sisa_uang_jalan").val().replace(/[^\d.-]/g, ''));
        if (!isNaN(sisaUangJalan)) {
            $("#sisa_uang_jalan").val(ribuanFormat(sisaUangJalan));
        }
    }

    $(document).ready(function () {
        calculateSum();
        if ("{{$data->sisa_uang_jalan}}" === "null") {
            const totalPengeluaran = parseFloat($("#total_pengeluaran_unformatted").val());
            const totalUangJalan = parseFloat("{{$data->schedule->uangJalan->total_uang_jalan}}");
            if (!isNaN(totalPengeluaran) && !isNaN(totalUangJalan)) {
                const sisaUangJalan = totalUangJalan - totalPengeluaran;
                $("#sisa_uang_jalan").val(ribuanFormat(sisaUangJalan));
            }
        }
        const inputFields = [
            'receh_di_jalan',
            'parkir_resmi',
            'parkir_liar',
            'helper',
            'tkbm_muat',
            'tkbm_bongkar',
            'cheker',
            'forklift',
            'security',
            'bbm',
            'etoll',
        ];

        inputFields.forEach(function (fieldName) {
            $("#" + fieldName).on('keyup', calculateSum);
        });
    });

</script>