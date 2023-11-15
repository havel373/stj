@php
use Carbon\Carbon;
@endphp
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
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">No SPK</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->no_spk}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Date</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->tanggal}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Unit</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->unit?->no_pol}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Driver</a> :
                        <a class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->driver?->nama_driver}}</a>
                        <!--end::Event=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Customer</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->customer?->nama_customer}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Muat</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->muat}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Bongkar</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->bongkar}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Note</a> :
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary">{{$monitoring?->schedule?->note}}</a></td>
                        <!--end::Event=-->
                    </tr>
                    <tr>
                        <!--begin::Event=-->
                        <td class="min-w-400px">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Status</a> :
                        @if($monitoring?->schedule?->status == 0)
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary">New</a>
                        @elseif($monitoring?->schedule?->status == 1)
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary">Request Uang Jalan</a>
                        @elseif($monitoring?->schedule?->status == 2)
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary">Ongoing</a>
                        @elseif($monitoring?->schedule?->status == 3)
                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary">Complete</a>
                        @endif
                        </td>
                        <!--end::Event=-->
                    </tr>
                       {{-- @if($monitoring->berangkat == 0 && $monitoring->kirim_barang == 0 && $monitoring->selesai == 0 && $monitoring->done == 0 && $monitoring->control == 0)
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Kirim Barang</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                @php
                                    $route = 'berangkat';
                                @endphp
                                <input type="file" id="berangkat" name="berangkat" class="form-control form-control-solid" value="{{$monitoring->berangkat}}" />
                            </div>
                            @elseif($monitoring->kirim_barang == 0 && $monitoring->selesai == 0 && $monitoring->done == 0 && $monitoring->control == 0 && $monitoring->berangkat == 1)
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Kirim Berangkat</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                @php
                                    $route = 'kirim.barang';
                                @endphp
                                <input type="file" id="kirim_barang" name="kirim_barang" class="form-control form-control-solid" value="{{$monitoring->kirim_barang}}" />
                            </div>
                            @elseif($monitoring->selesai == 0 && $monitoring->done == 0 && $monitoring->control == 0 && $monitoring->kirim_barang == 1 && $monitoring->berangkat == 1)
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Selesai</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                @php
                                    $route = 'selesai';
                                @endphp
                                <input type="file" id="selesai" name="selesai" class="form-control form-control-solid" value="{{$monitoring->selesai}}" />
                            </div>
                            @elseif($monitoring->done == 0 && $monitoring->control == 0 && $monitoring->selesai == 1 && $monitoring->kirim_barang == 1 && $monitoring->berangkat == 1)
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Done</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                @php
                                    $route = 'done';
                                @endphp
                                <input type="file" id="done" name="done" class="form-control form-control-solid" value="{{$monitoring->done}}" />
                            </div>
                            @elseif($monitoring->control == 0 && $monitoring->done == 1 && $monitoring->selesai == 1 && $monitoring->kirim_barang == 1 && $monitoring->berangkat == 1)
                            <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Foto Control</label>
                            <!--begin::Input group-->
                            <div class="mb-5">
                                @php
                                    $route = 'control';
                                @endphp
                                <input type="file" id="control" name="control" class="form-control form-control-solid" value="{{$monitoring->control}}" />
                            </div>
                            @endif --}}
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
            <div class="mt-5 pt-4">
                <h1 class="text-primary" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Foto
                    </button>
                </h1>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                    <tr class="fw-bolder text-muted">
                                        <th class="w-25px">
                                            No
                                        </th>
                                        <th class="min-w-125px">
                                            <a href="#" class="fw-bolder text-gray-800 text-hover-primary me-1">Foto</a>
                                        </th>
                                        <th class="min-w-125px">Status Tracking</th>
                                        {{-- <th class="min-w-125px">Lihat Foto</th> --}}
                                        <th class="min-w-125px">Catatan</th>
                                        <th class="min-w-125px">Waktu Upload</th>
                                        <th class="min-w-100px">Status / Actions</th>
                                    </tr>
                                </thead>
                                @foreach($monitoring?->details as $i => $item)
                                    <tr>
                                        <td>
                                            <p>{{$i+1}}</p>
                                        </td>
                                        <td>
                                            {{-- <img src="{{$item->image}}" alt="" style="height:150px;width:200px;"> --}}
                                            @foreach ($item?->attachment as $attachment)
                                                <img src="{{$attachment->image}}" alt="" style="max-height:100px;max-width:100px;">
                                            @endforeach
                                        </td>
                                        <td>
                                            <p>{{$item->masterStatus->nama_status}}</p>
                                        </td>
                                        {{-- <td>
                                            <a target="_blank" href="{{$item->image}}" >Lihat</a>
                                        </td> --}}
                                        <td>
                                            <p>{{$item->catatan ? $item->catatan : '-'}}</p>
                                        </td>
                                        <td>
                                            @php
                                                $ina = Carbon::createFromFormat('D, M j, Y g:i A', $item->created_at->toDayDateTimeString())->translatedFormat('l, d F Y H:i');
                                            @endphp
                                            <p>{{$ina}}</p>
                                        </td>
                                        <td class="min-w-150px">
                                            @if($item->status == 'menunggu')
                                                    <button class="mx-1 btn btn-sm btn-primary" onclick="handle_confirm('{{route('monitoringDetail.approveFoto', $item->id)}}');">Setujui</button class="mx-1 btn btn-sm btn-primary">
                                                    <button class="mx-1 btn btn-sm btn-warning" onclick="reject('{{route('monitoringDetail.rejectFoto', $item->id)}}');">Tolak</button>
                                            @else
                                                    <p>{{$item->status}}</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
