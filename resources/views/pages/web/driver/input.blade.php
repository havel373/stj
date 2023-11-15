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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nama Driver</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="nama_driver" name="nama_driver" class="form-control form-control-solid" placeholder="Nama Driver" value="{{$data?->users?->name}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tanggal Masuk</label>
                                        <div class="mb-5">
                                            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control form-control-solid" value="{{$data->tanggal_masuk}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">NO KTP</label>
                                        <div class="mb-5">
                                            <input type="tel" id="no_ktp" name="no_ktp" class="form-control form-control-solid" value="{{$data->no_ktp}}" maxlength="16"/>
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Alamat</label>
                                        <div class="mb-5">
                                            <textarea name="alamat" id="alamat" class="form-control form-control-solid">{{$data->alamat}}</textarea>
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">PIC</label>
                                        <div class="mb-5">
                                            <input type="text" id="pic" name="pic" class="form-control form-control-solid"  value="{{$data->pic}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nomor Telp</label>
                                        <div class="mb-5">
                                            <input type="tel" id="nomor_telp" name="nomor_telp" class="form-control form-control-solid" value="{{$data?->users?->no_hp}}" />
                                        </div>
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">User</label>
                                        <div class="mb-5">
                                            <select name="user_id" id="user_id" class="form-control form-control-solid">
                                                <option value="">Pilih User</option>
                                                @foreach ($user as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $data->user_id ? 'selected' : ''}}>{{$item->name}} - {{$item->hp}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="status" id="status" class="form-control form-control-solid">
                                                <option value="">Pilih Status</option>
                                                <option value="batangan" {{$data->status == 'batangan' ? 'selected' : ''}}>Batangan</option>
                                                <option value="bukan" {{$data->status == 'bukan' ? 'selected' : ''}}>Bukan Batangan</option>
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
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('driver.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('driver.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
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