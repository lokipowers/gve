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
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Cost</th>
                                    </thead>
                                    <tbody>
                                    @foreach($equipment as $item)
                                        @php
                                            $type = strtolower($item->type);
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
                                            <td>{{ nl2br($item->$type->description) }}</td>
                                            <td>{{ ucwords($type) }}</td>
                                            <td style="white-space: nowrap;">{{ $item->cost_price->symbol }} {{ number_format($item->cost_price->converted, 2, '.', ',') }}</td>
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

