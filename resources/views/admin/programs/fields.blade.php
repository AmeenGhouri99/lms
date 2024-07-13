<div class="row m-1">
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Program Name</label>
        {{ html()->text('name')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="">Parent Program Name
            </span></label>
        {{ html()->select('parent_id', ['' => 'select Parent'] + $parent_programs)->value(settings('admission_end_date'))->class('form-control form-control-sm') }}
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
