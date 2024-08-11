@extends('backend.partials.app')

@push('css')
<style>
    /* .form-section {
        display: none;
    }

    .form-section.current {
        display: inherit;
    } */


    .dummy {
        color: rgb(0, 0, 0)
    }

</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- --}}
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Add Tenant</h5>
                            <div class="row">
                                <!-- Basic Layout -->
                                <div class="col-xxl">
                                    <div class="card mb-4">
                                        <div class="card-body" style="background: #a8cc66;">
                                            @if (session('success'))
                                            <div class="alert slert-success timeout" style="color: green">{{ session('success') }}</div>
                                            @elseif (session('error'))
                                            <div class="alert slert-danger timeout">{{ session('error') }}</div>
                                            @endif
                                            @include('error')


                                            <form class="form-demo" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                {{-- 2nd step --}}
                                                <div class="form-section">
                                                    <div class="row mb-3">
                                                        
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="fullname">Tanent Name</label>
                                                            <input type="text" class="form-control" name="name" id="fullname"/>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="permanent_address">Address</label>
                                                            <input type="text" class="form-control" name="permanent_address" id="permanent_address" />
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="phone">Phone Number</label>
                                                            <input type="number" class="form-control" name="phone" id="phone"/>
                                                        </div>

                                                      
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="shopNo">Shop No</label>
                                                            <input type="text" class="form-control" name="shopNo" id="shopNo" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="monthly_rent">Monthly Rent</label>
                                                            <input type="number" class="form-control" name="monthly_rent" id="monthly_rent" />
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="advance_amount">Advance Amount</label>
                                                            <input type="number" class="form-control" name="advance_amount" id="advance_amount" />
                                                        </div>

                                                
                                                        
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="inst_start">Start Date</label>
                                                            <input type="date" class="form-control" name="start_from" id="inst_start" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="start_to">Agreement Deadline</label>
                                                            <input type="date" class="form-control" name="start_to" id="start_to" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="reference_name_a">Reference Name</label>
                                                            <input type="text" class="form-control" name="reference_name_a" id="reference_name_a" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="reference_cell_a">Reference Cell Number</label>
                                                            <input type="number" class="form-control" name="reference_cell_a" id="reference_cell_a" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="nid_image">Nid Image</label>
                                                            <input type="file" class="form-control my-2" name="nid_image" id="nominee_image" />
                                                            {{-- <img style="width:200px;height:200px" id="showNImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3"> --}}
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="basic-default-name">USER Image</label>
                                                            <input type="file" class="form-control my-2" name="user_image" id="image" />
                                                            <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                        </div>
                                                       

                                                    </div>

                                                </div>
                                                {{-- 3rd step --}}
                                                
                                                <button type="submit" class="btn btn-success pull-right">Submit</button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@push('js')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
{{-- sharif code  --}}
<script>
    $(document).ready(function() {
        //investor Image
        $('#image').change('click', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
        //nominee image
        $(document).ready(function() {
            $('#nominee_image').change('click', function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showNImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    });
    setTimeout(() => {
        $('.timeout').fadeOut('slow')
    }, 3000);
    //
    // Initially hide all the input fields
   
    //select 2
   
    // Calculate Total Amount
    // Use keyup method for real-time updates
   
    //revesly
</script>

{{-- lggkl

@endpush
