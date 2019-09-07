@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Equipment')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">group</i>
                            </div>
                            <h4 class="card-title">Equipment Marketplace</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                                    <thead class="text-primary">
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Attack</th>
                                    <th>Defence</th>
                                    <th>Cost</th>
                                    <th>P&P</th>
                                    <th>ETA</th>
                                    </thead>
                                    <tbody>
                                    @foreach($equipment as $item)
                                        @php
                                            $type = strtolower($item->type);
                                            $affordable = 'success';

                                            if($currentUser->character->currency->converted < ($item->cost_price->converted + $item->localShippingCost)){
                                                $affordable = 'danger';
                                            }
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="avatar avatar-md" style="width:250px; height:150px;overflow: hidden;">
                                                    <a href="{{ route('equipment.purchase', ['id' => $item->id, 'type' => $type]) }}" style="display:flex;height:100%;">
                                                        <img src="{{ $item->$type->thumbnail }}" alt="{{ $item->$type->name }} Thumbnail" style="max-width: 100%;align-self:center;">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('equipment.purchase', ['id' => $item->id, 'type' => $type]) }}" style="white-space: nowrap;">{{ $item->$type->name }}</a>
                                            </td>
                                            <td>{{ ucwords($type) }}</td>
                                            <td>{{ $item->$type->attack }}</td>
                                            <td>{{ $item->$type->defence }}</td>
                                            <td class="text-{{ $affordable }}" style="white-space: nowrap;">
                                                <strong>{{ $item->cost_price->symbol }} {{ number_format($item->cost_price->converted, 2, '.', ',') }}</strong>
                                            </td>
                                            <td class="text-{{ $affordable }}" style="white-space: nowrap;">
                                                <strong>{{ $item->cost_price->symbol }} {{ number_format($item->localShippingCost, 2, '.', ',') }}</strong>
                                            </td>
                                            <td>
                                                <i style="font-size:1.2em; vertical-align: sub;" class="material-icons">access_time</i>
                                                {{ $item->localShippingDuration }}
                                                @if($item->localShippingDuration !== 'Instant') mins @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#datatables').fadeIn(1100);
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users",
                },
                /*"columnDefs": [
                    { "orderable": false, "targets": 5 },
                ],*/
            });
        });
    </script>
@endpush

