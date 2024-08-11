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
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Add Category</h5>
                            <div class="row">
                                <!-- Basic Layout -->
                                <div class="col-xxl">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            @if (session('success'))
                                            <div class="alert slert-success timeout" style="color: green">{{ session('success') }}</div>
                                            @elseif (session('error'))
                                            <div class="alert slert-danger timeout">{{ session('error') }}</div>
                                            @endif
                                            @include('error')


                                            <form class="form-demo" action="{{route('categoryPost')}}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                {{-- 2nd step --}}
                                                <div class="form-section">
                                                    <div class="row mb-3">
                                                        
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="fullname">Title</label>
                                                            <input type="text" class="form-control" name="title" id="title"/>
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
