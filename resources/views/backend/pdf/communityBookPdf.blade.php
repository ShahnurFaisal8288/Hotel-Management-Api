<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Invoice Print</title>
    <style>
        @page {
            sheet-size: A4;
            background-color: azure;
            vertical-align: top;
            margin-top: 0cm;
            margin-bottom: 0cm;
            margin-left: 0cm;
            margin-right: 0cm;
            margin-header: 0;
            margin-footer: 0;
            marks: none;
        }

        @media print {

            .btn-print,
            .btn-pdf {
                display: none;
            }

            .signature-section {
                display: block;
            }

        }

        .align-items-baseline {
            display: flex;
            align-items: center;
        }

        .col-xl-9 img {
            max-height: 120px;
            max-width: 150px;
            height: auto;
            width: auto;
        }

        .footer {
            margin-top: 10px;
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-baseline">
                            <div class="col-xl-12 col-md-12 col-sm-12" style="text-align:center;">
                                <img height="120px" width="150" style="display: block;margin: 0 auto;" src="{{ asset('backend/img/logo.png') }}" alt="" />
                                <h3 style="text-align:center;">Monihar</h3>
                                <h5 style="text-align:center;">Invoice</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="container">
                            <div class="row my-2 justify-content-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" style="border:1px solid #bfbfbf;">
                                        <thead class="text-white" style="border:1px solid #bfbfbf;background:#d7d7d7;">
                                            <tr>
                                                <th style="border:1px solid #bfbfbf; font-size:12px;">Name</th>
                                                <th style="border:1px solid #bfbfbf; font-size:12px;">Phone</th>
                                                <th style="border:1px solid #bfbfbf; font-size:12px;">Booking Date</th>
                                                <th style="border:1px solid #bfbfbf; font-size:12px;">Person's Quantity</th>
                                                <th style="border:1px solid #bfbfbf; font-size:12px;">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="border:1px solid #bfbfbf;">
                                                <td style="border:1px solid #bfbfbf; font-size:12px;">{{$bookPdf->name}}</td>
                                                <td style="border:1px solid #bfbfbf; font-size:12px;">{{$bookPdf->phone}}</td>
                                                <td style="border:1px solid #bfbfbf; font-size:12px;">{{ $date }}</td>
                                                <td style="border:1px solid #bfbfbf; font-size:12px;">{{$bookPdf->person_quantity}}</td>
                                                <td style="border:1px solid #bfbfbf; font-size:12px;">{{$bookPdf->total_amount}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4>Occasion : <strong>{{$bookPdf->occasion}}</strong></h4>
                            <h4>Paid Amount : {{$bookPdf->advance}}</h4>
                            <h4>Due : {{$bookPdf->due}}</h4>
                            <h4>Extra Service : {{$bookPdf->extra_service}}</h4>
                            <div style="width: 800px;margin: 0 auto;">
                                <div class="text" style="margin-top:80px;">
                                    <div style="float:left;width:200px;text-align:center;">
                                        <hr style="font-size:14px;">
                                        <h5 style="font-size:14px;">Applicant Signature</h5>
                                    </div>
                                    <div class=" " style="float:right;width:170px;text-align:center;margin-right:80px;">
                                        <hr style="font-size:14px;">
                                        <h5 style="font-size:14px; text-align:center">Authorised Signature</h5>
                                    </div>
                                </div>
                                <div class="footer">
                                    <div style="text-align: center">
                                        <div colspan="2" style="font-size:14px;padding:50px 15px 0 15px;margin-left:-80px;">
                                            <strong style="display:block;margin:0 0 10px 0;"></strong>
                                            <b>Address: Monihar, Jessore - Narail Rd, Jashore 7400, Jashore, Bangladesh</b>
                                        </div>
                                        <div colspan="2" style="font-size:14px;padding:10px 15px 0 15px;margin-left:-80px;">
                                            <b>Phone: +880 1745-286586. </b>
                                            <b>Email: booking@moniharcomplex.com</b>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
