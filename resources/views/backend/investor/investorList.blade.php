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
                            <h2>Tenant List</h2>
                        </div>
                        {{-- <div class="print">
                            <a href="" class="btn btn-primary pdf">CSV</a>
                            <a href="" class="btn btn-primary pdf">Excel</a>
                             <a class="btn btn-primary pdf" href="">PDF</a>
                             <a class="btn btn-primary pdf btnprn" href="" onclick="print()">Print</a>
                            </div> --}}

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>start_from</th>
                                    <th>start_to</th>
                                    <th>monthly_rent</th>
                                    <th>advance_amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php $i = 1 @endphp
                                 @foreach($investor as $investors)
                                
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$investors->name}}</td>
                                    <td>{{$investors->email}}</td>
                                    <td>{{$investors->phone}}</td>
                                    <td>{{$investors->start_from}}</td>
                                    <td>{{$investors->start_to}}</td>
                                    <td>{{$investors->monthly_rent}}</td>
                                    <td>{{$investors->advance_amount}}</td>
                                   
                                    <td width="100%" style="white-space:nowrap;">
                                        <a class="btn btn-secondary" href="{{ route('investor_org_show',$investors->id) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-info" href="{{ route('investor_show',$investors->id) }}"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-primary" href="{{ route('investor.list',$investors->id) }}"><i class="fas fa-print"></i></a>
                                        <a class="btn btn-dark" href="{{ route('bookingPdf',$investors->id) }}"><i class="fas fa-receipt"></i></a>
                                        {{-- <a class="btn btn-danger " id="delete" href="{{ route('investor_delete',$investors->id) }}"><i class="fas fa-trash"></i></a> --}}
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
<!--/ Hoverable Table rows -->

@endsection
@push('js')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
<script>
    new DataTable('#example', {
        select: true
    });

</script>
@endpush
