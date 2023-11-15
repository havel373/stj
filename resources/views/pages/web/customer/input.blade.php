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
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Customer</small>
                <!--end::Description-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <!--end::Separator-->
                <!--begin::Description-->
                @if ($data->id)
                <small class="text-muted fs-7 fw-bold my-1 ms-1">Update</small>
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">{{$data->nama_customer}}</small>
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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Nama Customer</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="nama_customer" name="nama_customer" class="form-control form-control-solid" placeholder="Nama Customer" value="{{$data->nama_customer}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Alamat</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="address" id="address" class="form-control form-control-solid">{{$data->address}}</textarea>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">PIC</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="pic" name="pic" class="form-control form-control-solid" placeholder="PIC" value="{{$data->pic}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Email</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="email" id="email" name="email" class="form-control form-control-solid" placeholder="email" value="{{$data->email}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Owner</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="owner" name="owner" class="form-control form-control-solid" placeholder="Owner" value="{{$data->owner}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">No Hp PIC</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="no_hp_pic" name="no_hp_pic" class="form-control form-control-solid" placeholder="No Hp PIC" value="{{$data->no_hp_pic}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tipe</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="tipe" id="tipe" class="form-control form-control-solid">
                                                <option value="">Pilih Tipe</option>    
                                                <option value="stj" {{$data->tipe == 'stj' ? 'selected' : ''}}>STJ</option>    
                                                <option value="bml" {{$data->tipe == 'bml' ? 'selected' : ''}}>BML</option>    
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
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('customer.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('customer.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
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
</script>