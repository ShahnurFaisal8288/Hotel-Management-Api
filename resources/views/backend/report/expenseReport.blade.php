@extends('backend.partials.app')
@section('content')
@push('css')
<style>
    /* Your CSS here */
</style>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

<div class="container customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="customer-card mb-3" style="margin-top:-10px;">
                        <div class="area-h3">
                            <h2>Expense List</h2>
                        </div>                       
                    </div>
                    <div class="report mb-5">
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Expense</th>
                                    <th>Expense Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($expenses as $expense)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$expense->totalAmount}}</td>
                                    <td>{{ \Carbon\Carbon::parse($expense->created_at)->format('d-M-y') }}</td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$expense->id}}" class="btn btn-outline-success" id="view"><i class="fas fa-eye"></i></a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $expense->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Expense Details</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                               
                                                                @if($expense->categories->isEmpty())
                                                                    <p>No Categories found</p>
                                                                @else
                                                                    @foreach($expense->categories as $category)
                                                                    <p><strong>Expense Category: </strong> {{ $category->title }}</p>
                                                                    <p><strong>Quantity: </strong> {{ $category->pivot->quantity}}</p>
                                                                    <p><strong>Amount: </strong> {{ $category->pivot->amount }}</p>
                                                                    <p><strong>Description: </strong> {{ $category->pivot->details }}</p>
                                                                    <hr>
                                                                    @endforeach
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

@endsection

@push('js')
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
<script>
    new DataTable('#example', {
        select: true
    });
</script>
@endpush
