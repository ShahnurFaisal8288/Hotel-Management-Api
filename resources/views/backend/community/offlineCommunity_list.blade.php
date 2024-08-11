@extends('backend.partials.app')
@section('content')
@push('css')
<style>
    .customer-card {
        display: flex;
        justify-content: space-between;
    }

    .customer-container {
        margin: 0 0 310px 0;
    }
    h3, h1, h2, h5, h6, p, td, th, table, tr span{
        color: black
    }

</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<!-- Hoverable Table rows -->
<div class="container customer-container">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body" style="background: #a8cc66;">
                    <div class="customer-card mb-3" style="margin-top:-10px;">
                        <div class="area-h3">
                            <h2>Offline Booking List</h2>
                        </div>


                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Booking Date</th>
                                    <th>Occasion</th>
                                    <th>Total Person</th>
                                    <th>Price</th>
                                    <th>Advance</th>
                                    <th>Due</th>
                                    <th>Extra Service</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1
                                @endphp
                                @foreach($community as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            
                                            <td>{{ \Carbon\Carbon::parse($item->date)->format('d-M-y') }}</td>

                                            <td>{{ $item->occasion }}</td>
                                            <td>{{ $item->person_quantity }}</td>
                                            <td>{{ $item->total_amount }}</td>
                                            <td>{{ $item->advance }}</td>
                                            <td>{{ $item->due }}</td>
                                            <td>{{ $item->extra_service }}</td>
                                    <td width="100%" style="white-space:nowrap;">
                                        <a class="btn btn-primary" href="{{ route('community.print',$item->id) }}"><i class="fas fa-print"></i></a>

                                        <a class="btn btn-danger " id="delete" href="{{ route('community.delete',$item->id) }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr> @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('js')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
<script>
    new DataTable('#example', {
        select: true
    });

</script>
@endpush
