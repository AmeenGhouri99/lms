@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="content-body">
        <section id="dashboard-ecommerce">
            <div class="row match-height">
                <!-- Academic Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <h3>Documents to be attached</h3>
                    <ul style="color: red">
                        <li>Please upload the all required images below.</li>
                        <li>Any Image more than 150KB will not be uploaded reduce. <a
                                href="https://www.resizepixel.com/reduce-image-in-kb/">Click</a> to reduce the image size
                        </li>

                        {{-- <li>Becareful in entering the marks</li>
                        <li>Your Programs will be displayed accordingly </li> --}}
                    </ul>
                    <div class="card card-statistics">
                        <div class="card-body statistics-body">
                            {{ html()->form('PUT', '/post')->open() }}
                            <div class="row">
                                <div class="d-flex mb-1">
                                    <a href="#" class="me-25">
                                        {{-- <img src="{{ $user->profile_image_url ? asset($user->profile_image_url) : asset('app-assets/no-image-icon.png') }}" --}}
                                        <img src="{{ asset('app-assets/images/no_image_icon.jpg') }}"
                                            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image"
                                            height="100" width="100" />
                                    </a>
                                    <!-- upload and reset button -->
                                    <div class="d-flex align-items-end mt-75 ms-1">
                                        <div>
                                            <label for="account-upload"
                                                class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                            <input type="file" id="account-upload" name="profile_image" hidden
                                                accept="image/*" />
                                            <button type="button" id="account-reset"
                                                class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                        </div>
                                    </div>
                                    <!--/ upload and reset button -->
                                </div>
                                <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Select Document Type</label>
                                    {{ html()->select('document_type', ['' => 'Select Document Type', 'CNIC_BFORM' => 'CNIC/B-Form Front', 'scanned_copy_of_last_degree' => 'Scanned Copy of Last Degree Transcript'])->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1">
                                    <input type="submit" value="Save" name="submit" class="btn btn-success btn-sm">
                                    <input type="reset" value="Cancel" class="btn btn-secondary btn-sm">
                                </div>
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Academic Card -->
            </div>
        </section>

    </div>
    <!-- END: Content-->
@endsection
