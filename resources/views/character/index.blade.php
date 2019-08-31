@extends('layouts.app', ['activePage' => 'character.create', 'titlePage' => __('Characters')])



@php

    function sideClass($side){

        switch($side){
            case 'GOOD':
                return 'success';
            break;
            case 'BAD':
                return 'danger';
            break;
            default:
                return 'default';
        }
    }

@endphp

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
                            <h4 class="card-title">Characters</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                                    <thead class="text-primary">
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Side</th>
                                        <th>Rank</th>
                                        <th>Location</th>
                                        <th>Wealth</th>
                                    </thead>
                                    <tbody>
                                    @foreach($characters as $character)
                                        <tr>
                                            <td>
                                                <div class="avatar avatar-sm rounded-circle img-circle" style="width:100px; height:100px;overflow: hidden;">
                                                    <a href="{{ route('character.view', ['id' => $character->id]) }}">
                                                        <img src="{{ $character->avatar_url }}" alt="{{ $character->name }} Avatar" style="max-width: 100px;">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('character.view', ['id' => $character->id]) }}">{{ $character->name }}</a>
                                            </td>
                                            <td>
                                                <span style="vertical-align: middle;" class="badge badge-{{ sideClass($character->side) }}">{{ strtolower(ucwords($character->side)) }}</span>
                                            </td>
                                            <td>{{ $character->rank->name }}</td>
                                            <td>{{ $character->location->name }}, {{ $character->location->country }}</td>
                                            <td>${{ number_format($character->dollars, 2, '.', ',') }}</td>
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
