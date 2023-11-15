<div class="table-responsive">
    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
        <!--begin::Table head-->
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="w-25px">
                    No
                </th>
                <th class="min-w-125px">Tanggal</th>
                <th class="min-w-125px">No Pol</th>
                <th class="min-w-125px">Tipe Unit</th>
                <th class="min-w-125px">Driver</th>
                <th class="min-w-125px">Customer</th>
                <th class="min-w-125px">Muat</th>
                <th class="min-w-125px">Bongkar</th>
                <th class="min-w-125px">Status</th>
                <th class="min-w-100px">Jumlah Request Uang Jalan</th>
                <th class="min-w-100px text-end">Actions</th>
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody>
            @if ($collection->count()>0)
                @foreach ($collection as $no => $item)
                <tr>
                    <td>
                        {{$collection->firstItem()+$no}}
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->tanggal}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->unit->no_pol}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->unit->type_unit}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->driver->nama_driver}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->customer->nama_customer}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->muat}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->bongkar}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                @if($item->status == 0)
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">New</a>
                                    @elseif($item->status == 1)
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Request Uang Jalan</a>
                                    @elseif($item->status == 2)
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Ongoing</a>
                                    @elseif($item->status == 3)
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Complete</a>
                                    @elseif($item->status == 4)
                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Cancel</a>
                                @endif
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Rp. {{number_format($item->uangJalan->uang_jalan)}}</a>
                                {{-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> --}}
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <a href="javascript:;" onclick="load_input('{{route('uangJalan.edit',$item->uangJalan->id)}}');" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                    <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                </svg>
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="12" class="text-center">
                    No Data
                </td>
            </tr>
            @endif
        </tbody>
        <!--end::Table body-->
    </table>
</div>
{{ $collection->links() }}