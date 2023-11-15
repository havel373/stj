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
                            <th class="min-w-100px">Status</th>
                        </tr>
                    </thead>
                    @foreach($monitoring?->details as $i => $item)
                        <tr>
                            <td>
                                <p>{{$i+1}}</p>
                            </td>
                            <td>
                                @foreach ($item?->attachment as $attachment)
                                    <img src="{{$attachment->image}}" alt="" style="max-height:100px;max-width:100px;">
                                @endforeach
                            </td>
                            <td>
                                <p>{{$item?->masterStatus?->nama_status}}</p>
                                {{-- @if($item->berangkat == 1 && $item->kirim_barang == 0 && $item->selesai == 0 && $item->done == 0 && $item->control == 0)
                                    Berangkat
                                @elseif($item->berangkat == 1 && $item->kirim_barang == 1 && $item->selesai == 0 && $item->done == 0 && $item->control == 0)
                                    Kirim Barang
                                @elseif($item->berangkat == 1 && $item->kirim_barang == 1 && $item->selesai == 1 && $item->done == 0  && $item->control == 0)
                                    Selesai
                                @elseif($item->berangkat == 1 && $item->kirim_barang == 1 && $item->selesai == 1 &&  $item->done == 1 && $item->control == 0)
                                    Done
                                @elseif($item->berangkat == 1 && $item->kirim_barang == 1 && $item->selesai == 1 &&  $item->done == 1 && $item->control == 1)
                                    Control
                                @endif --}}
                            </td>
                            {{-- <td>
                                <a target="_blank" href="{{$item->image}}" >Lihat</a>
                            </td> --}}
                            <td>
                                <p>{{$item->catatan ? $item->catatan : '-'}}</p>
                            </td>
                            <td class="min-w-150px">
                                <p>{{$item->status}}</p>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
