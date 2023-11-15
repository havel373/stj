<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <div class="card card-flush">
            <div class="card-body pt-0">
                <div class="mt-5 px-3 pt-4">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="w-25px">
                                        No
                                    </th>
                                    <th class="min-w-125px">Tanggal</th>
                                    <th class="min-w-125px">No SPK</th>
                                    @foreach($status as $i => $val)
                                        @if ($i === 1)
                                            <th class="min-w-125px">No DO</th>
                                        @endif
                                        <th class="min-w-125px">{{ucfirst($val->nama_status)}}</th>
                                    @endforeach
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
                                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item?->schedule?->tanggal}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item?->schedule?->no_spk}}</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        @foreach($status as $i => $val)
                                        @php
                                            $statusDetail = collect($item->details)->filter(function($detail) use($val) {
                                                return $detail->master_status == $val->id;
                                            })->sortByDesc('created_at')
                                            ->first();
                                            
                                            
                                        @endphp
                                            @if ($i === 1)
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$item->nomor_do}}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <input
                                                    type="checkbox"
                                                    name="berangkat"
                                                    id="berangkat"
                                                    disabled
                                                    @if($statusDetail?->master_status != $val->id)
                                                         class="form-check-input"
                                                    @endif
                                                    @if(!$statusDetail)
                                                         class="form-check-input"
                                                    @endif
                                                    @if($statusDetail)
                                                        checked
                                                    @endif
                                                    
                                                    @if($statusDetail?->status == 'menunggu' )
                                                         class="form-check-input bg-info"
                                                    @endif
                                                    @if($statusDetail?->status == 'diterima' )
                                                         class="form-check-input bg-success"
                                                    @endif
                                                    @if($statusDetail?->status == 'ditolak' )
                                                         class="form-check-input bg-danger"
                                                    @endif
                                                    >
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                        <td class="text-end">
                                            <a href="javascript:;" onclick="load_input('{{route('monitoringSopir.show',$item->id)}}');" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
                                                </span>
                                            </a>
                                            @if(
                                            // $item->nomor_do != null &&
                                             $item->latestDetail?->status != 'menunggu' && $item?->latestDetail?->master_status != '5')
                                            <a href="javascript:;" onclick="load_input('{{route('monitoringSopir.edit',$item->id)}}');" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </svg>
                                                </span>
                                            </a>
                                            @endif
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
{{ $collection->links() }}