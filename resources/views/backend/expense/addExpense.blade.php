@extends('backend.partials.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .showinline {
        display: inline-block;
    }
</style>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                @if (session('success'))
                                                <div class="alert alert-success timeout" style="color: green">{{ session('success') }}</div>
                                                @elseif (session('error'))
                                                <div class="alert alert-danger timeout">{{ session('error') }}</div>
                                                @endif

                                                <div style="text-align: center;">
                                                    <h2>Add Expense</h2>
                                                </div>

                                                <div class="show_transaction">
                                                    <div class="row">
                                                        <div class="col-md-2 mb-3">
                                                            <label for="example-text-input" class="form-label">Category</label>
                                                            <select class="form-control service_id" name="category_id[]">
                                                                <option value="">Select Category</option>
                                                                @foreach ($category as $value)
                                                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="quantity" class="form-label">Quantity</label>
                                                            <input class="form-control quantity" type="number" name="quantity[]" value="1" placeholder="Enter Quantity">
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="details" class="form-label">Description</label>
                                                            <textarea class="form-control" name="details[]"></textarea>
                                                        </div>
                                                        <div class="col-md-2 mb-3">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input class="form-control amount" type="text" name="amount[]">
                                                            <input class="form-control singleamount" type="hidden" name="singleamount[]">
                                                        </div>
                                                        <div class="col-md-2 mt-4">
                                                            <button class="btn btn-success add_item_btn">Add More</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="total_amount">Total Amount</label>
                                                            <input type="text" name="totalAmount" id="total_amount" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <input type="submit" value="Add" class="btn btn-primary w-25" id="add_btn">
                                                </div>
                                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".add_item_btn").click(function(e) {
            e.preventDefault();
            $(".show_transaction").prepend(`<div class="row">
                <div class="col-md-2 mb-3">
                    <label for="example-text-input" class="form-label">Service & Product Name </label>
                    <select class="form-control service_id" name="category_id[]" >
                        <option value="">Select Service & Product</option>
                        @foreach ($category as $value)
                        <option id="customer_id" value="{{ $value->id }}">{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="quantity" class="form-label quantity">Quantity</label>
                    <input class="form-control quantity" type="number" name="quantity[]" id="quantity" value="1" placeholder="Enter Quantity">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="details" class="form-label">Description</label>
                    <textarea class="form-control" name="details[]"></textarea>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input class="form-control amount" type="text" name="amount[]" id="amount">
                    <input class="form-control singleamount" type="hidden" name="singleamount[]">
                </div>
                <div class="col-md-2 mt-4">
                    <button class="btn btn-danger remove_item_btn">Remove</button>
                </div>
            </div>`);
        });

        $(document).on('click', '.remove_item_btn', function(e) {
            let row_item = $(this).parent().parent();
            $(row_item).remove();
            calculateTotalAmount();
        });

        $('body').on('keyup change', '.amount, .quantity', function() {
            calculateTotalAmount();
        });

        $('body').on('change', '.service_id', function() {
            // AJAX call to fetch price based on service_id if needed
        });

        function calculateTotalAmount() {
            var totalAmount = 0;
            $('.amount').each(function() {
                totalAmount += parseFloat($(this).val()) || 0;
            });
            $('#total_amount').val(totalAmount.toFixed(2));
        }

        calculateTotalAmount();
    });

</script>

@endpush
