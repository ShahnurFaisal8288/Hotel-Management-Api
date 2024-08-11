@extends('backend.partials.app')
@section('title')
    Add Module
@endsection
@section('content')
    <div class="container customer-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-head mx-5 my-3 customer-card">
                        <div class="left">
                            <h3>Admin Create</h3>
                        </div>
                        <div class="search">
                            <a href="{{ route('adminList') }}" class="btn btn-primary" title="Add Category">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                Admin List</a>
                        </div>
                    </div>
                </div>
                @include('error')
                <div class="card">
                    <div class="card-body" style="background: #a8cc66;">
                        <div class="col-lg-8">
                            <form action="{{ route('adminCreate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Name</strong></label>
                                    <input type="text" id="name" name="name" placeholder="Admin Name" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="name"><strong>Email</strong></label>
                                    <input type="text" id="email" name="email" placeholder="Admin Email" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="mobile"><strong>Mobile</strong></label>
                                    <input type="text" id="phone" name="phone" placeholder="Admin Mobile Number" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="name"><strong>Password</strong></label>
                                    <input type="password" id="password" name="password" placeholder="Admin Password" class="form-control my-2">
                                </div>
                                <div class="form-group">
                                    <label for="designation"><strong>Dsignation</strong></label>
                                  <select id="designation" name="designation"  class="form-control my-2">
                                    <option value="">Select Designation</option>
                                    <option value="cmo">C.M.O</option>
                                    <option value="team_leader">Team Leader</option>
                                    <option value="sales_person">Sales Person</option>
                                    <option value="digital_marketing_team">Digital Marketing Team</option>
                                    <option value="acc&other">ACC. & Other</option>
                                    <option value="crm_team">CRM Team</option>
                                  </select>
                                </div>

                                <label for="user_role">Choose a Role:</label>
                                <select id="user_role" name="user_role" class="form-control">
                                    @foreach($adminCreate as $roles)
                                    <option  value="{{$roles->id}}">{{ $roles->role_name }}</option>
                                @endforeach

                                </select>
                                <div class="form-group">
                                    <label for="booking_ratio"><strong>Booking Ratio</strong></label>
                                    <input type="text" id="booking_ratio" name="booking_ratio" class="form-control my-2">

                                </div>
                                <div class="form-group">
                                    <label for="installment_ratio"><strong>Installment Ratio</strong></label>

                                    <input type="text" id="installment_ratio" name="installment_ratio" class="form-control my-2">
                                </div>

                                <input type="submit" value="Submit" class="btn btn-primary my-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
       $('#user_role').change(function () {
           var user_role = $(this).val();

           $.ajax({

               url: '/ratio',
               type: 'get',
               dataType: 'json',
               data:'user_role='+user_role,
               success: function (data) {
                console.log(data)
                   $('#booking_ratio').val(data[0]);
                   $('#installment_ratio').val(data[1]);
               },
               error: function (xhr, status, error) {
                   console.error(xhr.responseText);
               }
           });
       });
   });
</script>
@endpush







