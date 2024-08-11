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

            .abc {
                background: #a8cc66;
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
                    <div class="card-body abc">
                        <div class="customer-card mb-3" style="margin-top:-10px;">
                            <div class="area-h3 m-3">
                                <h2>Booking List</h2>
                            </div>
                            <div class="add-btn m-3">
                                <a class="add-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="fas fa-plus"></i></a>
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
                                    @php $i = 1; @endphp
                                    @foreach ($communities as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
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
                                                <a class="btn btn-primary" href="{{ route('community.print', $item->id) }}"><i class="fas fa-print"></i></a>
                                                <a class="btn btn-warning" href="{{ route('community.list', $item->id) }}"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger" id="delete" href="{{ route('community.delete', $item->id) }}"><i class="fas fa-trash"></i></a>
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

    <!-- Edit Modal -->
    @if(isset($community))
        <div class="modal fade show" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; padding-right: 17px;">
            @include('error')
            <form action="{{ route('community.editPost', $community->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Booking</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group my-2">
                                <label for="name">Name</label>
                                <input class="form-control" value="{{ $community->name }}" type="text" name="name" id="name">
                            </div>
                            <div class="form-group my-2">
                                <label for="phone">Phone</label>
                                <input class="form-control" value="{{ $community->phone }}" type="number" name="phone" id="phone">
                            </div>
                            <div class="form-group my-2">
                                <label for="date">Date</label>
                                <input class="form-control" value="{{ $community->date }}" type="date" name="date" id="date">
                            </div>
                            <div class="form-group my-2">
                                <label for="occasion">Occasion</label>
                                <input class="form-control" value="{{ $community->occasion }}" type="text" name="occasion" id="occasion">
                            </div>
                            <div class="form-group my-2">
                                <label for="person_quantity">Person's Quantity</label>
                                <input class="form-control" value="{{ $community->person_quantity }}" type="number" name="person_quantity" id="person_quantity">
                            </div>
                            <div class="form-group my-2">
                                <label for="extra_service">Extra Service</label>
                                <textarea class="form-control" name="extra_service" id="extra_service">{{ $community->extra_service }}</textarea>
                            </div>
                            <div class="form-group my-2">
                                <label for="total_amount">Total Amount</label>
                                <input class="form-control" value="{{ $community->total_amount }}" type="number" name="total_amount" id="total_amount">
                            </div>
                            <div class="form-group my-2">
                                <label for="advance">Advance</label>
                                <input class="form-control" value="{{ $community->advance }}" type="number" name="advance" id="advance">
                            </div>
                            <div class="form-group my-2">
                                <label for="due">Due Amount</label>
                                <input class="form-control" value="{{ $community->due }}" type="number" name="due" id="due" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @include('error')
        <form action="{{ route('community.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Booking(Physically)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="form-group my-2">
                            <label for="phone">Phone</label>
                            <input class="form-control" type="number" name="phone" id="phone">
                        </div>
                        <div class="form-group my-2">
                            <label for="date">date</label>
                            <input class="form-control" type="date" name="date" id="date">
                        </div>

                        <div class="form-group my-2">
                            <label for="occasion">Occasion</label>
                            <input class="form-control" type="text" name="occasion" id="occasion">
                        </div>
                        <div class="form-group my-2">
                            <label for="person_quantity">Person's Quantity</label>
                            <input class="form-control" type="number" name="person_quantity" id="person_quantity">
                        </div>
                        <div class="form-group my-2">
                            <label for="extra_service">extra_service</label>
                            <textarea class="form-control" name="extra_service" id="extra_service"></textarea>

                        </div>
                        <div class="form-group my-2">
                            <label for="total_amount">Total Amount</label>
                            <input class="form-control" type="number" name="total_amount" id="total_amount">
                        </div>
                        <div class="form-group my-2">
                            <label for="advance">Advance</label>
                            <input class="form-control" type="number" name="advance" id="advance">
                        </div>
                        <div class="form-group my-2">
                            <label for="due">Due Amount</label>
                            <input class="form-control" type="number" name="due" id="due" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <a type="submit" class="btn btn-secondary">Close</a> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- end modal --}}
@endsection
@push('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
    <script>
        new DataTable('#example', {
            select: true
        });
        document.getElementById('total_amount').addEventListener('input', calculateDue);
        document.getElementById('advance').addEventListener('input', calculateDue);

        function calculateDue() {
            const totalAmount = parseFloat(document.getElementById('total_amount').value || 0)
            const advance = parseFloat(document.getElementById('advance').value || 0)
            const dueAmount = totalAmount - advance;
            document.getElementById('due').value = dueAmount;
        }
    </script>
@endpush
