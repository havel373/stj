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
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Employee / Karyawan</small>
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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nama</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="name" name="name" class="form-control form-control-solid" placeholder="Nama" value="{{$data->name}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nomor HP</label>
                                        <div class="mb-5">
                                            <input type="tel" id="no_hp" name="no_hp" class="form-control form-control-solid" value="{{$data->no_hp}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Username</label>
                                        <div class="mb-5">
                                            <input type="text" id="username" name="username" class="form-control form-control-solid" value="{{$data->username}}" maxlength="16"/>
                                        </div>
                                        @if(!$data->id)
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Password</label>
                                        <div class="mb-5">
                                            <input type="password" id="password" name="password" class="form-control form-control-solid"  value="{{$data->password}}" />
                                        </div>
                                        @endif
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto</label>
                                        <div class="mb-5">
                                            <input type="file" id="foto" name="foto" class="form-control form-control-solid" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Role</label>
                                        <div class="mb-5">
                                            <select name="role" id="role" class="form-control form-control-solid">
                                                <option value="">Pilih Role</option>
                                                <option value="s">Sopir / Driver</option>
                                                <option value="b">Bos</option>
                                                <option value="a">Admin</option>
                                                <option value="z">Semua Hak</option>
                                                <option value="sales">Sales</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Button-->
                                <div class="mb-0">
                                    @if ($data->id)
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('employee.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('employee.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
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
    select2('id_driver');
    select2('user_id');
    number_only('no_ktp');
    number_only('nomor_telp');
</script>