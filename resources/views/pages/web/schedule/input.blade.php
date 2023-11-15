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
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Tanggal</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="date" id="tanggal" name="tanggal" class="form-control form-control-solid" value="{{$data->tanggal}}" min="{{date('Y-m-d')}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Unit</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="id_unit" id="id_unit" class="form-control form-control-solid">
                                                <option value="">Pilih Unit</option>
                                                @foreach ($unit as $item)
                                                <option value="{{$item->id}}" {{$item->id == $data->id_unit ? 'selected' : ''}}>{{$item->no_pol}} - {{$item->type_unit}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Driver</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="id_driver" id="id_driver" class="form-control form-control-solid">
                                                <option value="">Pilih Driver</option>
                                                @foreach ($driver as $item)
                                                <option value="{{$item->id}}" {{$item->id == $data->id_driver ? 'selected' : ''}}>{{$item->users->name}} - {{$item->status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Customer</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="id_customer" id="id_customer" class="form-control form-control-solid">
                                                <option value="">Pilih Customer</option>
                                                @foreach ($customer as $item)
                                                    <option value="{{$item->id}}" {{$item->id == $data->id_customer ? 'selected' : ''}}>{{$item->nama_customer}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Muat</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="muat" name="muat" class="form-control form-control-solid" value="{{$data->muat}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bongkar</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="bongkar" name="bongkar" class="form-control form-control-solid" value="{{$data->bongkar}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Note</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" id="note" name="note" class="form-control form-control-solid" value="{{$data->note}}" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Status</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <select name="status" id="status" class="form-control form-control-solid">
                                                <option value="">Pilih Status</option>
                                                <option value="0" {{$data->status == 0 ? 'selected' : ''}}>New</option>
                                                <option value="1" {{$data->status == 1 ? 'selected' : ''}}> Request Uang Jalan</option>
                                                <option value="2" {{$data->status == 2 ? 'selected' : ''}}> Ongoing</option>
                                                <option value="3" {{$data->status == 3 ? 'selected' : ''}}> Complete</option>
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
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('schedule.update',$data->id)}}','PATCH','Save');" class="btn btn-light-primary">Save</button>
                                    @else
                                    <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('schedule.store')}}','POST','Save');" class="btn btn-light-primary">Save</button>
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
    select2('id_unit');
    select2('id_driver');
    select2('id_customer');
</script>