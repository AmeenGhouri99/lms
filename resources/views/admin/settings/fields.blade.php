<div class="row m-1">
    <label for="name">Admissin Picture</label>

    <div class="d-flex mb-1">
        <a href="#" class="me-25">
            @php
                $admissionPicture = settings('admission_picture');
            @endphp

            <img src="{{ isset($admissionPicture) && $admissionPicture ? asset('storage/' . $admissionPicture) : asset('app-assets/images/no_image_icon.jpg') }}"
                id="account-upload-img" class="uploadedAvatar rounded me-50" alt="Admission Picture" height="100"
                width="100" />
        </a>
        <div class="d-flex align-items-end mt-75 ms-1">
            <div>
                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                <input type="file" id="account-upload" name="admission_picture" hidden accept="image/*" />
                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Admission Start Date</label>
        {{ html()->date('admission_start_date')->value(settings('admission_start_date'))->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Admission End Date
            </span></label>
        {{ html()->date('admission_end_date')->value(settings('admission_end_date'))->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-12 col-12 mb-2 mb-xl-0">
        <label for="name">Admission Fee</span></label>
        {{ html()->text('admission_fee')->value(settings('admission_fee'))->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-12 col-12 mb-2 mb-xl-0">
        <label for="name">Admission Term</span></label>

        {{ html()->select('admission_term', ['' => 'Select', 'Fall' => 'Fall', 'Spring' => 'Spring'], settings('admission_term'))->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-12 col-12 mb-2 mb-xl-0">
        <label for="name">University Entry Test</span></label>
        {{ html()->date('university_entry_test', settings('university_entry_test'))->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1 text-start" id="submit_button">
        <input type="submit" value="Update Setting" name="submit" class="btn btn-success btn-sm">
    </div>
</div>
<script>
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
