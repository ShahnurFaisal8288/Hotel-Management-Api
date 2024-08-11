@extends('backend.partials.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
<div  id="exampleModal">
    @include('error')
    <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>

                </div>
                <div class="modal-body" style="background: #a8cc66;">
                    <div class="form-group my-2">
                    </div>
                    <div class="form-group">
                        <label for="lead">Lead User</label>
                        <select name="lead_user" id="lead" class="form-control">
                            <option value="">Select Lead User</option>
                            @foreach($leadUser as $leads)
                            <option value="{{$leads->id}}">{{$leads->full_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="todays_update">Todays Updated</label>
                        <input type="text" name="todays_update" class="form-control" id="todays_update">
                    </div>
                    <div class="form-group">
                        <label for="next_action" >Next Action</label>
                        <input type="text" name="next_action" class="form-control" id="next_action">
                    </div>
                    <div class="form-group my-2">
                        <label for="description">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Interested">Interested</option>
                            <option value="Not Interested">Not Interested</option>
                            <option value="Not Receive">Not Receive</option>
                            <option value="Appointment Schedule">Appointment Schedule</option>
                            <option value="Sure Secure">Sure Secure</option>
                            <option value="Critical">Critical</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    $('#lead').change(function () {
        var lead = $(this).val();
        $.ajax({
            url: '/getAssist',
            type: 'get',
            dataType: 'json',
            data:'lead='+lead,
            success: function (data) {
                $('#lead_assist').html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
//teamleader
$(document).ready(function () {
    $('#lead').change(function () {
        var lead = $(this).val();
        $.ajax({
            url: '/getTeamLeader',
            type: 'get',
            dataType: 'json',
            data:'lead='+lead,
            success: function (data) {
                $('#teamLeader').html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
<script>
     $(document).ready(function() {
            $('#lead').select2();

        });
</script>

@endpush
