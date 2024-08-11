@extends('backend.partials.app')

@push('css')
<style>
    .form-section {
        display: none;
    }

    .form-section.current {
        display: inherit;
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
                            <h5 class="card-title text-primary" style="text-transform: uppercase">Edit Investor</h5>
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
                                                            <input type="text" value="{{ $investor->name }}" class="form-control" name="name" id="fullname"/>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="permanent_address">Address</label>
                                                            <input type="text" value="{{ $investor->permanent_address }}" class="form-control" name="permanent_address" id="permanent_address" />
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="phone">Phone Number</label>
                                                            <input type="number" value="{{ $investor->phone }}" class="form-control" name="phone" id="phone"/>
                                                        </div>
                                                     

                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="shopNo">Shop No</label>
                                                            <input type="text" value="{{ $investor->shopNo }}" class="form-control" name="shopNo" id="shopNo" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="monthly_rent">Monthly Rent</label>
                                                            <input type="number" value="{{ $investor->monthly_rent }}" class="form-control" name="monthly_rent" id="monthly_rent" />
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="advance_amount">Advance Amount</label>
                                                            <input type="number" value="{{ $investor->advance_amount }}" class="form-control" name="advance_amount" id="advance_amount" />
                                                        </div>



                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="inst_start">Start Date</label>
                                                            <input type="date" value="{{ $investor->start_from }}" class="form-control" name="start_from" id="inst_start" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="start_to">Agreement Deadline</label>
                                                            <input type="date" value="{{ $investor->start_to }}" class="form-control" name="start_to" id="start_to" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="reference_name_a">Reference Name</label>
                                                            <input type="text" class="form-control" name="reference_name_a" value="{{ $investor->reference_name_a }}" id="reference_name_a" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="reference_cell_a">Reference Cell Number</label>
                                                            <input type="number" value="{{ $investor->reference_cell_a }}" class="form-control" name="reference_cell_a" id="reference_cell_a" />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="nid_image">Nid Image</label>
                                                            <input type="file"  class="form-control my-2" name="nid_image" id="nominee_image" />
                                                            @if($investor->nid_image)
                                                            <img style="width:200px;height:200px" id="showNImage" src="{{ asset($investor->nid_image) }}" alt="" class="image-style mb-3">
                                                            @else
                                                            <img style="width:200px;height:200px" id="showNImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                            @endif
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label my-2 dummy" for="basic-default-name">USER Image</label>
                                                            <input type="file" class="form-control my-2" name="user_image" id="image" />
                                                            @if($investor->user_image)
                                                            <img style="width:200px;height:200px" id="showImage" src="{{ asset($investor->user_image) }}" alt="" class="image-style mb-3">
                                                            @else
                                                            <img style="width:200px;height:200px" id="showImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                                                            @endif
                                                           
                                                        </div>

                                                       
                                                    </div>
                                                    <button type="submit" class="btn btn-success pull-right">Update</button>
                                                </div>
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
    // Hide all input fields initially
    $("#chqDiv, #poDiv, #ttDiv, #ddDiv, #bank_nameDiv, #branch_nameDiv").hide();

    // Show/hide input fields based on dropdown selection
    $("#payment_type2").change(function() {
        console.log("Dropdown value changed:", $(this).val()); // Check if the change event is triggered

        // Hide all input fields
        $("#chqDiv, #poDiv, #ttDiv, #ddDiv, #bank_nameDiv, #branch_nameDiv").hide();

        // Get the selected value
        var selectedValue = $(this).val();

        // Show the corresponding input field(s)
        if (selectedValue === "chq") {
            $("#chqDiv").show();
        } else if (selectedValue === "Online_Payment") {
            $("#bank_nameDiv, #branch_nameDiv").show();
        }
    });
    //select 2
    $(document).ready(function() {
        $('#id_employee').select2();
        $('#team_leader').select2();
    });
    // Calculate Total Amount
    // Use keyup method for real-time updates
    $('#no_ownership, #price_ownership,#special_discount,#down_payment,#no_of_installment').on('keyup', function() {
        var $no_ownership = $('#no_ownership').val();
        var $price_ownership = $('#price_ownership').val();
        var $special_discount = $('#special_discount').val();
        var $down_payment = $('#down_payment').val();
        var $no_of_installment = $('#no_of_installment').val();

        if (!isNaN($no_ownership) && !isNaN($price_ownership)) {
            // Calculate and update the agreed_price value
            $totalAmount = $no_ownership * $price_ownership;
            $mainAmount = ($totalAmount - $special_discount).toFixed(2);
            $totalMianAmount = $mainAmount - $down_payment;
            $('#totalPrice').val($totalAmount);
            $('#main_amount_first,#main_amount').val($totalMianAmount);
            //no of owenership
            $('#inst_per_month').val(($totalMianAmount / $no_of_installment).toFixed(2));

        } else {
            console.error("Invalid input values. Please enter valid numbers.");
        }
    });
    //revesly
    $('#main_amount,#inst_per_month').on('keyup', function() {
        var $main_amount = $('#main_amount').val();
        var $inst_per_month = $('#inst_per_month').val();


        $('#no_of_installment').val(Math.round(parseFloat($main_amount)) / Math.round(parseFloat($inst_per_month)));
    })

    // monthly increment
    $('#inst_start').on('change', function() {
        var startMonth = $(this).val();
        var noInstallment = $('#no_of_installment').val();

        if (startMonth && noInstallment && !isNaN(noInstallment)) {
            var startDate = new Date(startMonth);
            var endDate = new Date(startDate);
            if (startDate.getDate() < 10) {
                endDate.setMonth(startDate.getMonth() + parseInt(noInstallment));

            } else {
                endDate.setMonth(startDate.getMonth() + parseInt(noInstallment) - 1);

            }

            // Calculate end date based on the number of installments (monthly increment)


            // Set the calculated end date to the 'Installment End' field
            $('#inst_to').val(formatDate(endDate));
        } else {
            alert("Please select both Installment Start and a valid No. Of Installment");
        }
    });

    $('#no_of_installment').on('input', function() {
        var startMonth = $('#inst_start').val();
        var noInstallment = $(this).val();

        if (startMonth && noInstallment && !isNaN(noInstallment)) {
            var startDate = new Date(startMonth);
            var endDate = new Date(startDate);

            // Calculate end date based on the number of installments (monthly increment)
            if (startDate.getDate() < 10) {
                endDate.setMonth(startDate.getMonth() + parseInt(noInstallment));

            } else {
                endDate.setMonth(startDate.getMonth() + parseInt(noInstallment) - 1);

            }

            // Set the calculated end date to the 'Installment End' field
            $('#inst_to').val(formatDate(endDate));
        } else {
            alert("Please select both Installment Start and a valid No. Of Installment");
        }
    });

    function formatDate(date) {
        var dd = date.getDate();
        var mm = date.getMonth() + 1; // January is 0!
        var yyyy = date.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        return yyyy + '-' + mm + '-' + dd;
    }
    // Quarter Month
    $('#quarterly').on('change', function() {
        if ($(this).prop('checked')) {
            // Execute the date calculation logic only if the "Quarterly" checkbox is checked

            $('#inst_start').on('change', calculateEndDate);
            $('#no_of_installment').on('input', calculateEndDate);
        } else {
            // If the "Quarterly" checkbox is not checked, remove event handlers
            $('#inst_start').off('change', calculateEndDate);
            $('#no_of_installment').off('input', calculateEndDate);
        }
    });

    function calculateEndDate() {
        var startMonth = $('#inst_start').val();
        var noInstallment = $('#no_of_installment').val();

        if (startMonth && noInstallment && !isNaN(noInstallment)) {
            var startDate = new Date(startMonth);

            // Calculate end date based on the number of installments (monthly increment)
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() - 1 + parseInt(noInstallment) * 3);

            // Set the calculated end date to the 'Installment End' field
            $('#inst_to').val(formatDate(endDate));
        } else {
            alert("Please select both Installment Start and a valid No. Of Installment");
        }
    }

    function formatDate(date) {
        var dd = date.getDate();
        var mm = date.getMonth() + 1; // January is 0!
        var yyyy = date.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        return yyyy + '-' + mm + '-' + dd;
    }
    // Half Yearly

    $('#half_yearly').on('change', function() {
        if ($(this).prop('checked')) {
            // Execute the date calculation logic only if the "Quarterly" checkbox is checked

            $('#inst_start').on('change', calculateHalfEndDate);
            $('#no_of_installment').on('input', calculateHalfEndDate);
        } else {
            // If the "Half Yearly" checkbox is not checked, remove event handlers
            $('#inst_start').off('change', calculateHalfEndDate);
            $('#no_of_installment').off('input', calculateHalfEndDate);
        }
    });

    function calculateHalfEndDate() {
        var startMonth = $('#inst_start').val();
        var noInstallment = $('#no_of_installment').val();

        if (startMonth && noInstallment && !isNaN(noInstallment)) {
            var startDate = new Date(startMonth);

            // Calculate end date based on the number of installments (monthly increment)
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() - 1 + parseInt(noInstallment) * 6);

            // Set the calculated end date to the 'Installment End' field
            $('#inst_to').val(formatDate(endDate));
        } else {
            alert("Please select both Installment Start and a valid No. Of Installment");
        }
    }

    function formatDate(date) {
        var dd = date.getDate();
        var mm = date.getMonth() + 1; // January is 0!
        var yyyy = date.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        return yyyy + '-' + mm + '-' + dd;
    }
    // end Half Yearly
    //  Yearly

    $('#yearly').on('change', function() {
        if ($(this).prop('checked')) {
            // Execute the date calculation logic only if the "Quarterly" checkbox is checked

            $('#inst_start').on('change', calculateYearlyEndDate);
            $('#no_of_installment').on('input', calculateYearlyEndDate);
        } else {
            // If the "Half Yearly" checkbox is not checked, remove event handlers
            $('#inst_start').off('change', calculateYearlyEndDate);
            $('#no_of_installment').off('input', calculateYearlyEndDate);
        }
    });

    function calculateYearlyEndDate() {
        var startMonth = $('#inst_start').val();
        var noInstallment = $('#no_of_installment').val();

        if (startMonth && noInstallment && !isNaN(noInstallment)) {
            var startDate = new Date(startMonth);

            // Calculate end date based on the number of installments (monthly increment)
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() - 1 + parseInt(noInstallment) * 12);

            // Set the calculated end date to the 'Installment End' field
            $('#inst_to').val(formatDate(endDate));
        } else {
            alert("Please select both Installment Start and a valid No. Of Installment");
        }
    }

    function formatDate(date) {
        var dd = date.getDate();
        var mm = date.getMonth() + 1; // January is 0!
        var yyyy = date.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        return yyyy + '-' + mm + '-' + dd;
    }
    // end  Yearly
    //  Yearly

    $('#at_a_time').on('change', function() {
        if ($(this).prop('checked')) {
            // Execute the date calculation logic only if the "Quarterly" checkbox is checked
            $('#no_of_installment').val(3);
            $('#inst_start').on('change', calculateAtAtimeEndDate);
            $('#no_of_installment').on('input', calculateAtAtimeEndDate);
        } else {
            // If the "Half Yearly" checkbox is not checked, remove event handlers
            $('#inst_start').off('change', calculateAtAtimeEndDate);
            $('#no_of_installment').off('input', calculateAtAtimeEndDate);
        }
    });

    function calculateAtAtimeEndDate() {
        var startMonth = $('#inst_start').val();
        var noInstallment = $('#no_of_installment').val();

        if (startMonth && noInstallment && !isNaN(noInstallment)) {
            var startDate = new Date(startMonth);

            // Calculate end date based on the number of installments (monthly increment)
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() - 1 + parseInt(noInstallment) * 1);

            // Set the calculated end date to the 'Installment End' field
            $('#inst_to').val(formatDate(endDate));
        } else {
            alert("Please select both Installment Start and a valid No. Of Installment");
        }
    }

    function formatDate(date) {
        var dd = date.getDate();
        var mm = date.getMonth() + 1; // January is 0!
        var yyyy = date.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        return yyyy + '-' + mm + '-' + dd;
    }
    // end  Yearly
    $(function() {
        var $sections = $('.form-section');

        function navigateTo(index) {
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }

        function curIndex() {
            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function() {
            navigateTo(curIndex() - 1);
        });
        $('.form-navigation .next').click(function() {
            $('.form-demo').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function() {
                navigateTo(curIndex() + 1);
            });
        });
        $sections.each(function(index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block' + index);
        });
        navigateTo(0);
    });

    function calculateOwnership() {
        var ownershipSizeValue = parseFloat(document.getElementById("ownership_size").value) || 1;
        var noOwnershipValue = parseFloat(document.getElementById("no_ownership").value) || 1;
        let result = ownershipSizeValue * noOwnershipValue;
        document.getElementById("ownership_size").value = result;
    }

</script>

{{-- lggkldfg --}}
<script>
    function roundAndSetInputValue(inputId) {
        var inputValue = document.getElementById(inputId).value;
        var roundedValue = Math.round(parseFloat(inputValue));
        document.getElementById(inputId).value = roundedValue;
    }

    function roundAndSetInputValue(inputId) {
        var inputValue = document.getElementById(inputId).value;
        var roundedValue = Math.round(parseFloat(inputValue));
        document.getElementById(inputId).value = roundedValue;
    }

    //  //no.of installment will be not greater than 48
    $(document).ready(function() {
        $('#no_of_installment').on('input', function() {
            var installment = parseInt($(this).val(), 10);

            if (isNaN(installment) || installment > 48) {
                $(this).val(48);
                alert('Please enter a value less than or equal to 48.');
            }
        });
    });

</script>

@endpush
