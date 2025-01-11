@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Pay Admission Fee</h3>
                    <ul style="color: red">
                        <li>Entries with (*) is Compulsory.</li>

                        {{-- <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li> --}}
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            {{-- @dd($admission_detail) --}}
                            <a href="{{ route('user.generate-pdf', ['id' => $admission_detail->id]) }}"
                                class="btn btn-primary" id="printVoucher">Print Chalan</a>
                            @include('flash::message')
                            {{ html()->form('POST', route('user.pay-admission-fee.store'))->attribute('enctype', 'multipart/form-data')->open() }}
                            <div id="submit_challan_fields" style="display: none">
                                <div class="row mb-1">
                                    <div class="col-12">Upload Deposited Fee Chalan / Online Payment Receipt </div>
                                    <div class="d-flex mb-1">
                                        <a href="#" class="me-25">
                                            <img src="{{ isset($user) && $user ? asset('storage/' . $user->profile_image) : asset('app-assets/images/no_image_icon.jpg') }}"
                                                id="account-upload-img" class="uploadedAvatar rounded me-50"
                                                alt="profile image" height="100" width="100" />
                                        </a>
                                        <div class="d-flex align-items-end mt-75 ms-1">
                                            <div>
                                                <label for="account-upload"
                                                    class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                                <input type="file" id="account-upload" name="chalan_pic" hidden
                                                    accept="image/*" />
                                                <button type="button" id="account-reset"
                                                    class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Payment Method:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <select class="form-control form-control-sm" id="degree_level_to_apply"
                                            name="payment_method">
                                            <option value="" selected disabled>Select Payment Method</option>
                                            <option value="Bank Chalan">Bank Chalan</option>
                                            <option value="Online Bank">Online Bank</option>
                                            <option value="Easypaisa">Easypaisa</option>
                                            <option value="Jazzcash">Jazzcash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Admission Form No:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" type="text"
                                            value="{{ $admission_detail->id }}" disabled>
                                        <input class="form-control form-control-sm" name="admission_no" type="hidden"
                                            value="{{ $admission_detail->id }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Chalan No:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" name="chalan_no" type="text"
                                            value="{{ old('chalan_no') }}{{ $admission_detail->voucher_no }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Admission Date:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" type="date"
                                            value="{{ $admission_detail->admission_date }}" disabled>
                                        <input class="form-control form-control-sm" name="admission_date" type="hidden"
                                            value="{{ $admission_detail->admission_date }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Amount Deposit:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" name="" type="text"
                                            value="{{ $admission_detail->admission_amount }}" disabled>
                                        <input class="form-control form-control-sm" name="admission_fee" type="hidden"
                                            value="{{ $admission_detail->admission_amount }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Transaction/Receipt ID/No:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" name="transaction_id" type="text"
                                            placeholder="Enter Transaction Id/Receipt No"
                                            value="{{ old('transaction_id') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Deposite Date:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" name="deposit_date" type="date"
                                            value="{{ old('deposit_date') }}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-xl-2 col-sm-2 col-12 mb-xl-0">
                                        Enter Bank Name:
                                    </div>
                                    <div class="col-xl-4 col-sm-10 col-12 mb-2 mb-xl-0">
                                        <input class="form-control form-control-sm" name="bank_name" type="text"
                                            placeholder="Enter Bank Name" value="{{ old('bank_name') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0" id="submit_button">
                                        <input type="submit" value="Upload & Submit" name="submit"
                                            class="btn btn-success btn-sm">
                                    </div>
                                </div>
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Academic Card -->
    </div>
    </section>

    </div>
    <!-- END: Content-->
    @push('js_scripts')
        <script>
            $(document).on('click', '#printVoucher', function(e) {
                // e.preventDefault(); // Prevent the default action of the button
                $('#submit_challan_fields').show();

                // Show the loader and disable the button
                // $('#printVoucher').addClass('disabled').attr('aria-disabled', 'true');

                // Fetch the URL from the button
            });



            $(document).ready(function() {
                var form = $('.validate-form'),
                    accountUploadImg = $('#account-upload-img'),
                    accountUploadBtn = $('#account-upload'),
                    accountUserImage = $('.uploadedAvatar'),
                    accountResetBtn = $('#account-reset');

                if (accountUserImage) {
                    var resetImage = accountUserImage.attr('src');
                    accountUploadBtn.on('change', function(e) {
                        var reader = new FileReader(),
                            files = e.target.files;
                        reader.onload = function() {
                            if (accountUploadImg) {
                                accountUploadImg.attr('src', reader.result);
                            }
                        };
                        reader.readAsDataURL(files[0]);
                    });

                    accountResetBtn.on('click', function() {
                        accountUserImage.attr('src', resetImage);
                    });
                }
            });
        </script>
    @endpush
@endsection
