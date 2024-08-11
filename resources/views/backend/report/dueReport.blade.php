@extends('backend.partials.app')
@section('content')
@push('css')
<style>
    .add-btn {
        width: 60px;
        height: 60px;
        background: #ef5252;
        display: inline-block;
        text-align: center;
        line-height: 60px;
        border-radius: 50%;
        font-size: 30px;
        color: aliceblue;
        cursor: pointer;
    }

    .customer-card {
        display: flex;
        justify-content: space-between;
    }

    .customer-container {
        margin: 0 0 310px 0;
    }

    h3,
    h1,
    h2,
    h5,
    h6,
    p,
    td,
    th,
    table,
    tr span {
        color: black
    }

</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<!-- Hoverable Table rows -->
<div class="container customer-container mt-3">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body" style="background: #a8cc66;">
                    <div class="customer-card mb-3" style="margin-top:-10px;">
                        <div class="area-h3 m-3">
                            <h2>Due Report</h2>
                        </div>
                    </div>
                    <div class="report mb-5">
                        <form action="/postDueReport" method="GET">

                            <div class="col-md-12 d-flex">
                                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3" style="padding: 0 0px 0 5px">
                                    <input class="form-control" type="date" name="from_date">
                                </div>
                                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3" style="padding: 0 0px 0 5px">
                                    <input class="form-control" type="date" name="to_date">
                                </div>

                                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-3 col-3">
                                    <input class="btn btn-secondary mx-2" type="submit" value="Search">

                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderd" id="example">
                            <thead>

                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>From Month</th>
                                    <th>To Month</th>
                                    <th>Monthly Rent</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalInstPerAmount = 0;
                                $i =1;
                                @endphp
                                @foreach($investorPay as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->start_from}}</td>
                                    <td>{{$item->start_to}}</td>
                                    <td>{{$item->monthly_rent}}</td>


                                </tr>
                                @php
                                $totalInstPerAmount += $item->monthly_rent;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">Total Unpaid Amount</td>
                                    <td >Total = {{$totalInstPerAmount}}Tk.</td>
                                </tr>
                            </tfoot>
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
