<div class="row m-1">
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Program Name</label>
        {{ html()->text('name')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="parent_id">Parent Program Name</label>
        {{ html()->select('parent_id', ['' => 'select Parent'] + $parent_programs)->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-12 col-12 mb-2 mb-xl-0">
        <label for="admission_fee">Admission Fee</label>
        {{ html()->text('admission_fee')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-12 col-12 mb-2 mb-xl-0">
        <label for="admission_term">Admission Term</label>
        {{ html()->select('admission_term', ['' => 'Select', 'Fall' => 'Fall', 'Spring' => 'Spring'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-12 col-12 mb-2 mb-xl-0">
        <label for="university_entry_test">University Entry Test</label>
        {{ html()->date('university_entry_test')->class('form-control form-control-sm') }}
    </div>
    <!-- Checkbox pairs for Boolean Fields -->
    <div class="col-12 mb-2">
        <label>FSC Pre Engineering Can Apply</label>
        <div>
            {{ html()->checkbox('fsc_pre_eng_can_apply', '1', false)->class('form-check-input') }}
            <label for="fsc_pre_eng_can_apply_yes">Yes</label>

            {{ html()->checkbox('fsc_pre_eng_can_apply', '0', true)->class('form-check-input') }}
            <label for="fsc_pre_eng_can_apply_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>FSC Pre Medical Can Apply</label>
        <div>
            {{ html()->checkbox('fsc_pre_med_can_apply', '1', false)->class('form-check-input') }}
            <label for="fsc_pre_med_can_apply_yes">Yes</label>

            {{ html()->checkbox('fsc_pre_med_can_apply', '0', true)->class('form-check-input') }}
            <label for="fsc_pre_med_can_apply_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>DAE Chemical</label>
        <div>
            {{ html()->checkbox('dae_chemical', '1', false)->class('form-check-input') }}
            <label for="dae_chemical_yes">Yes</label>

            {{ html()->checkbox('dae_chemical', '0', true)->class('form-check-input') }}
            <label for="dae_chemical_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>DAE Mechanical</label>
        <div>
            {{ html()->checkbox('dae_mechanical', '1', false)->class('form-check-input') }}
            <label for="dae_mechanical_yes">Yes</label>

            {{ html()->checkbox('dae_mechanical', '0', true)->class('form-check-input') }}
            <label for="dae_mechanical_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>DAE Civil</label>
        <div>
            {{ html()->checkbox('dae_civil', '1', false)->class('form-check-input') }}
            <label for="dae_civil_yes">Yes</label>

            {{ html()->checkbox('dae_civil', '0', true)->class('form-check-input') }}
            <label for="dae_civil_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>DAE Electrical</label>
        <div>
            {{ html()->checkbox('dae_electrical', '1', false)->class('form-check-input') }}
            <label for="dae_electrical_yes">Yes</label>

            {{ html()->checkbox('dae_electrical', '0', true)->class('form-check-input') }}
            <label for="dae_electrical_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>DAE Chemical with 60% Percentage</label>
        <div>
            {{ html()->checkbox('dae_chemical_with_60_percentage', '1', false)->class('form-check-input') }}
            <label for="dae_chemical_with_60_percentage_yes">Yes</label>

            {{ html()->checkbox('dae_chemical_with_60_percentage', '0', true)->class('form-check-input') }}
            <label for="dae_chemical_with_60_percentage_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>DAE Electrical with 60% Percentage</label>
        <div>
            {{ html()->checkbox('dae_electrical_with_60_percentage', '1', false)->class('form-check-input') }}
            <label for="dae_electrical_with_60_percentage_yes">Yes</label>

            {{ html()->checkbox('dae_electrical_with_60_percentage', '0', true)->class('form-check-input') }}
            <label for="dae_electrical_with_60_percentage_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>FA Simple Can Apply</label>
        <div>
            {{ html()->checkbox('fa_simple_can_apply', '1', false)->class('form-check-input') }}
            <label for="fa_simple_can_apply_yes">Yes</label>

            {{ html()->checkbox('fa_simple_can_apply', '0', true)->class('form-check-input') }}
            <label for="fa_simple_can_apply_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>FA with IT/Math Can Apply</label>
        <div>
            {{ html()->checkbox('fa_with_it_math_can_apply', '1', false)->class('form-check-input') }}
            <label for="fa_with_it_math_can_apply_yes">Yes</label>

            {{ html()->checkbox('fa_with_it_math_can_apply', '0', true)->class('form-check-input') }}
            <label for="fa_with_it_math_can_apply_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>ICom Can Apply</label>
        <div>
            {{ html()->checkbox('icom_can_apply', '1', false)->class('form-check-input') }}
            <label for="icom_can_apply_yes">Yes</label>

            {{ html()->checkbox('icom_can_apply', '0', true)->class('form-check-input') }}
            <label for="icom_can_apply_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>ICS Can Apply</label>
        <div>
            {{ html()->checkbox('ics_can_apply', '1', false)->class('form-check-input') }}
            <label for="ics_can_apply_yes">Yes</label>

            {{ html()->checkbox('ics_can_apply', '0', true)->class('form-check-input') }}
            <label for="ics_can_apply_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>Entry Test Required</label>
        <div>
            {{ html()->checkbox('is_entry_test_required', '1', false)->class('form-check-input') }}
            <label for="is_entry_test_required_yes">Yes</label>

            {{ html()->checkbox('is_entry_test_required', '0', true)->class('form-check-input') }}
            <label for="is_entry_test_required_no">No</label>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>University Test Required</label>
        <div>
            {{ html()->checkbox('is_university_test_required', '1', false)->class('form-check-input') }}
            <label for="is_university_test_required_yes">Yes</label>

            {{ html()->checkbox('is_university_test_required', '0', true)->class('form-check-input') }}
            <label for="is_university_test_required_no">No</label>
        </div>
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
