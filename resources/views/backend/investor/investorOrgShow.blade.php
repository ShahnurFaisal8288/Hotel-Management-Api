<html>

<head>
    <title>Invoice Print</title>
    <style>
        @page {
            sheet-size: A4;
            background-color: azure;
            vertical-align: top;
            margin-top: 0cm;
            /* <any of the usual CSS values for margins> */
            margin-bottom: 0cm;
            /* <any of the usual CSS values for margins> */
            margin-left: 0cm;
            /* <any of the usual CSS values for margins> */
            margin-right: 0cm;
            /* <any of the usual CSS values for margins> */

            margin-header: 0;
            /* <any of the usual CSS values for margins> */
            margin-footer: 0;
            /* <any of the usual CSS values for margins> */
            marks: none;
            /crop | cross | none/
        }

    </style>

</head>

<body style="font-family: Open Sans, sans-serif; font-size: 14px; font-weight: 400; line-height: 1.4; color: #000;">
    <div style="width: 900px;
                margin:5px auto;">
        <div style="height: 130px;">
            <div style="float:left;">
                <img height="120px" width="150" src="{{ asset('backend/img/logo.png') }}" alt="" />
            </div>
            <div style="float:right;margin-right:140px;margin-top:20px;">

                @if($investor->user_image)
                <img height="120px" width="120" src="{{ asset($investor->user_image) }}" alt="" />
                @else
                <img style="width:120px;height:120px" id="showNImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                @endif

                @if($investor->nid_image)
                <img height="120px" width="120" src="{{ asset($investor->nid_image) }}" alt="" />
                @else
                <img style="width:120px;height:120px" id="showNImage" src="{{ asset('backend/img/previewImage.png') }}" alt="" class="image-style mb-3">
                @endif
            </div>
        </div>
        <hr />
        <div>
            <div style="width: 850px;
                margin:5px;
                height:600px;padding-left:30px; ">

                <div>
                    <div class="main-1">
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="display:inline-block;"><b>Applicant's Name</b> :</p>
                            <input type="text" value="{{ $investor->name }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Phone Number</b> :</p>
                            <input type="text" value="{{ $investor->phone }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                       
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Address</b>:</p>
                            <input type="text" value="{{ $investor->permanent_address }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Shop No</b>:</p>
                            <input type="text" value="{{ $investor->shopNo }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                       
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Monthly Rent</b>:</p>
                            <input type="text" value="{{ $investor->monthly_rent }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Advance Amount</b>:</p>
                            <input type="text" value="{{ $investor->advance_amount }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Start From</b>:</p>
                            <input type="text" value="{{ $investor->start_from }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Start To</b>:</p>
                            <input type="text" value="{{ $investor->start_to }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Reference Name</b>:</p>
                            <input type="text" value="{{ $investor->reference_name_a }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                        <div class="left" style="margin-bottom: -10px;margin-top:10px;">
                            <p style="width:14.5%;display:inline-block;"><b>Reference Cell</b>:</p>
                            <input type="text" value="{{ $investor->reference_cell_a }}" style="padding: 8px;border: 2px solid darkgray;border-radius: 8px;background: #d1cece;width:60%;" class="form-control" readonly>
                        </div>
                       
                       
                    </div>
                </div>
               
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
                    <div class="footer text-align:center " style="margin-top:10px;">
                        <div style="text-align: center">
                            <div colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                                <strong style="display:block;margin:0 0 10px 0;"></strong>
                                <b>Address: Monihar, Jessore - Narail Rd, Jashore 7400 Jashore, Bangladesh. </b>
                                <b>Phone: +880 1745-286586 </b>
                                <b>Email: booking@moniharcomplex.com</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- terms&conditions --}}

    {{--end terms&conditions --}}

</body>

</html>
