@extends('user.layouts.main')
@section('content')
    {{--
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper container-xxl p-0">

            <!-- Bread Crumb START-->
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ __('general.Settings')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ __('general.Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active">{{ __('general.Settings')}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <a class="dt-button create-new btn btn-primary" href="{{route('admin.dashboard')}}"><i
                                data-feather='arrow-left'></i></a>
                    </div>
                </div>
            </div>
            <!-- Bread Crumb END--> --}}

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                {{-- @include('admin.settings.setting_menu') --}}
                <!-- profile -->
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Profile Detail</h4>
                    </div>

                    <div class="card-body py-2 my-25">
                        @include('flash::message')
                        {{ html()->modelForm($user, 'PUT', route('user.profile.update'))->attribute('enctype', 'multipart/form-data')->open() }}
                        <div class="d-flex">
                            <a href="#" class="me-25">
                                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('app-assets/images/no_image_icon.jpg') }}"
                                    id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image"
                                    height="100" width="100" />
                            </a>
                            <!-- upload and reset button -->
                            <div class="d-flex align-items-end mt-75 ms-1">
                                <div>
                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                    <input type="file" id="account-upload" name="profile_image" hidden
                                        accept="image/*" />
                                    <p class="mb-0">PNG, JPG, JPEG Images Allowed</p>
                                </div>
                            </div>
                            <!--/ upload and reset button -->
                        </div>
                        <div class="validate-form mt-2 pt-50">
                            <div class="row">
                                <div class="col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Name <span class="text-danger">
                                            *</span></label>
                                    {{ html()->text('full_name')->class('form-control form-control-sm') }}
                                </div>
                                <div class=" col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Email <span class="text-danger">
                                            *</span></label>
                                    {{ html()->text('email')->class('form-control form-control-sm') }}
                                </div>
                                <div class=" col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Old Password <span class="text-danger">
                                            *</span></label>
                                    {{ html()->text('old_password')->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">New Password <span class="text-danger">
                                            *</span></label>
                                    {{ html()->text('password', '')->class('form-control form-control-sm') }}
                                </div>
                                <div class=" col-sm-6 col-12 mb-2 mb-xl-0">
                                    <label for="name">Confirm Password <span class="text-danger">
                                            *</span></label>
                                    {{ html()->text('password_confirmation')->class('form-control form-control-sm') }}
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-1 me-1">Save Changes</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                </div>
                            </div>
                        </div>
                        <!--/ form -->
                    </div>
                </div>
                {{ html()->form()->close() }}

                {{-- <!-- deactivate account  -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Delete Account</h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <div class="alert alert-warning">
                                    <h4 class="alert-heading">Are you sure you want to delete your account?</h4>
                                    <div class="alert-body fw-normal">
                                        Once you delete your account, there is no going back. Please be certain.
                                    </div>
                                </div>

                                <form id="formAccountDeactivation" class="validate-form" onsubmit="return false">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" data-msg="Please confirm you want to delete account" />
                                        <label class="form-check-label font-small-3" for="accountActivation">
                                            I confirm my account deactivation
                                        </label>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-danger deactivate-account mt-1">Deactivate Account</button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                <!--/ profile -->
                {{-- </div>
                </div>

            </div>
        </div>
    </div> --}}
                <!-- END: Content-->
            @endsection

            @push('js_scripts')
                <script>
                    $(document).ready(function() {
                        var form = $('.validate-form'),
                            accountUploadImg = $('#account-upload-img'),
                            accountUploadBtn = $('#account-upload'),
                            accountUserImage = $('.uploadedAvatar'),
                            accountResetBtn = $('#account-reset');

                        // Update user photo on click of button

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
