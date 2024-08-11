@extends('backend.partials.app')
@push('css')
<style>
    .bacground {
        background: beige;
    }

    /* .dashboar_box {
        background: #b90172;


    } */
    h3,
    span {
        color: rgb(255, 255, 255)
    }

</style>
@endpush
@section('content')
<div class="container-xxl flex-grow-1 container-p-y ">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 order-1">
            <div class="row">


                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body" style="background: #d65b09">
                            <a href="{{route('investorList')}}">
                                <span>Total Tenant</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $investor }} Person</h3>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-3 mb-4">
                    <div class="card">
                        <div class="card-body" style="background: #013cb9">
                            <span>Receivable In <strong>{{ $currentMonth }}</strong></span>
                            <h3 class="card-title text-nowrap mb-1">{{ $recievableAmount }} Tk.</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-3 mb-4">
                    <div class="card">
                        <div class="card-body" style="background: #8501b9">
                            <span>Revenue In <strong>{{ $currentMonth }}</strong></span>
                            <h3 class="card-title text-nowrap mb-1">{{ $monthlyIncome }} Tk.</h3>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-3  mb-4">
                    <div class="card">
                        <div class="card-body" style="background: #b90172">
                            <a href="{{route('unpaidInvestor')}}">
                                <span>Unpaid In <strong>{{ $currentMonth }}</strong></span>
                                <h3 class="card-title text-nowrap mb-1">{{ $monthlyUnpaid }} Tk.</h3>
                            </a>
                        </div>
                    </div>
                </div>




                {{-- @foreach($coursePay as $value)
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span></span>
                            <h3 class="card-title text-nowrap mb-1"></h3>
                        </div>
                    </div>
                </div>
            @endforeach --}}
                {{-- @foreach ($batch as $item)
                @dd($item);
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="card-title text-nowrap mb-1">{{ $item->batch->batch_name }}</span>
                {{-- @foreach($totalHighStd as $value) --}}
                {{-- <span class="card-title text-nowrap mb-1"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach --}}

            </div>
        </div>
        <!-- Total Revenue -->
    </div>

</div>
<!-- / Content -->
@endsection
