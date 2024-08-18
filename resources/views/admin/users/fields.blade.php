<div class="d-flex">
    <a href="#" class="me-25">
        <img src="{{ $user->personalInformation->profile_image ? asset('storage/' . $user->personalInformation->profile_image) : asset('app-assets/no-image-icon.png') }}"
            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
    </a>
    <!-- upload and reset button -->
    {{-- <div class="d-flex align-items-end mt-75 ms-1">
        <div>
            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
            <input type="file" id="account-upload" name="profile_image" hidden accept="image/*" />
            <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
        </div>
    </div> --}}
    <!--/ upload and reset button -->
</div>
<div class="validate-form mt-2 pt-50">
    <div class="row">
        <div class="col-12 col-sm-6">
            <label for="name">Candidate CNIC </label>
            {{ html()->text('cnic')->class('form-control form-control-sm') }}
        </div>
        <div class="col-12 col-sm-6">
            <label for="full_name">Full Name </label>
            {{ html()->text('full_name')->class('form-control form-control-sm') }}
        </div>
        <div class="col-12 col-sm-6">
            <label for="father_name">Father Name </label>
            {{ html()->text('father_name')->class('form-control form-control-sm') }}
        </div>
        <div class="col-12 col-sm-6">
            <label for="email">Email </label>
            {{ html()->text('email')->class('form-control form-control-sm') }}
        </div>
        <div class="col-12 col-sm-6">
            <label for="status">Status </label>
            {{ html()->select('status', ['' => 'Select Status', '1' => 'Active', '0' => 'InActive'])->class('form-control form-control-sm') }}
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-1 me-1">Update changes</button>
            <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
        </div>
    </div>
</div>
<!--/ form -->
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
