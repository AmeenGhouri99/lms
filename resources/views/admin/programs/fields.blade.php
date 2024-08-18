<div class="row m-1">
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Program Name</label>
        {{ html()->text('name')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="parent_id">Parent Program Name</label>
        @php
            $parent_programs_array = $parent_programs->toArray();
            $parent_programs_array = ['' => 'Select Parent'] + $parent_programs_array;
        @endphp

        {{ html()->select('parent_id', $parent_programs_array)->class('form-control form-control-sm')->attribute('id', 'parent_id') }}
    </div>
    <div id="check_box" style="display: none">
        <div class="col-12">
            <div class="row">
                <!-- Checkbox pairs for Boolean Fields -->
                <div class="col-3">
                    <label>FSC Pre Engineering Can Apply</label>
                    <div>
                        <input type="hidden" name="fsc_pre_eng_can_apply" value="0">
                        {{ html()->checkbox('fsc_pre_eng_can_apply', '1')->class('form-check-input')->checked(isset($program) && $program->fsc_pre_eng_can_apply == 1) }}
                        <label for="fsc_pre_eng_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>FSC Pre Medical Can Apply</label>
                    <div>
                        <input type="hidden" name="fsc_pre_med_can_apply" value="0">

                        {{ html()->checkbox('fsc_pre_med_can_apply', '1')->class('form-check-input')->checked(isset($program) && $program->fsc_pre_med_can_apply == 1) }}
                        <label for="fsc_pre_med_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>FSC Pre Eng With 60% Can Apply</label>
                    <div>
                        <input type="hidden" name="fsc_pre_eng_60_percentage_for_engineering_programs" value="0">

                        {{ html()->checkbox('fsc_pre_eng_60_percentage_for_engineering_programs', '1')->class('form-check-input')->checked(isset($program) && $program->fsc_pre_eng_60_percentage_for_engineering_programs == 1) }}
                        <label for="fsc_pre_med_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>DAE Chemical</label>
                    <div>
                        <input type="hidden" name="dae_chemical" value="0">

                        {{ html()->checkbox('dae_chemical', '1')->class('form-check-input')->checked(isset($program) && $program->dae_chemical == 1) }}
                        <label for="dae_chemical_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>DAE Mechanical</label>
                    <div>
                        <input type="hidden" name="dae_mechanical" value="0">

                        {{ html()->checkbox('dae_mechanical', '1')->class('form-check-input')->checked(isset($program) && $program->dae_mechanical == 1) }}
                        <label for="dae_mechanical_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>DAE Civil</label>
                    <div>
                        <input type="hidden" name="dae_civil" value="0">

                        {{ html()->checkbox('dae_civil', '1')->class('form-check-input')->checked(isset($program) && $program->dae_civil == 1) }}
                        <label for="dae_civil_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>DAE Electrical</label>
                    <div>
                        <input type="hidden" name="dae_electrical" value="0">

                        {{ html()->checkbox('dae_electrical', '1')->class('form-check-input')->checked(isset($program) && $program->dae_electrical == 1) }}
                        <label for="dae_electrical_yes">Yes Can</label>

                    </div>
                </div>
                <div class="col-3">
                    <label>DAE Chemical with 60% Percentage</label>
                    <div>
                        <input type="hidden" name="dae_chemical_with_60_percentage" value="0">

                        {{ html()->checkbox('dae_chemical_with_60_percentage', '1')->class('form-check-input')->checked(isset($program) && $program->dae_chemical_with_60_percentage == 1) }}
                        <label for="dae_chemical_with_60_percentage_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>DAE Electrical with 60% Percentage</label>
                    <div>
                        <input type="hidden" name="dae_electrical_with_60_percentage" value="0">

                        {{ html()->checkbox('dae_electrical_with_60_percentage', '1')->class('form-check-input')->checked(isset($program) && $program->dae_electrical_with_60_percentage == 1) }}
                        <label for="dae_electrical_with_60_percentage_yes"> Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>FA Simple Can Apply</label>
                    <div>
                        <input type="hidden" name="fa_simple_can_apply" value="0">

                        {{ html()->checkbox('fa_simple_can_apply', '1')->class('form-check-input')->checked(isset($program) && $program->fa_simple_can_apply == 1) }}
                        <label for="fa_simple_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>FA with IT/Math Can Apply</label>
                    <div>
                        <input type="hidden" name="fa_with_it_math_can_apply" value="0">
                        {{ html()->checkbox('fa_with_it_math_can_apply', '1')->class('form-check-input')->checked(isset($program) && $program->fa_with_it_math_can_apply == 1) }}
                        <label for="fa_with_it_math_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>ICom Can Apply</label>
                    <div>
                        <input type="hidden" name="icom_can_apply" value="0">

                        {{ html()->checkbox('icom_can_apply', '1')->class('form-check-input')->checked(isset($program) && $program->icom_can_apply == 1) }}
                        <label for="icom_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>ICS Can Apply</label>
                    <div>
                        <input type="hidden" name="ics_can_apply" value="0">

                        {{ html()->checkbox('ics_can_apply', '1')->class('form-check-input')->checked(isset($program) && isset($program) && $program->ics_can_apply == 1) }}
                        <label for="ics_can_apply_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>Entry Test Required</label>
                    <div>
                        <input type="hidden" name="is_entry_test_required" value="0">

                        {{ html()->checkbox('is_entry_test_required', '1')->class('form-check-input')->checked(isset($program) && $program->is_entry_test_required == 1) }}
                        <label for="is_entry_test_required_yes">Yes Can</label>
                    </div>
                </div>
                <div class="col-3">
                    <label>University Test Required</label>
                    <div>
                        <input type="hidden" name="is_university_test_required" value="0">

                        {{ html()->checkbox('is_university_test_required', '1')->class('form-check-input')->checked(isset($program) && $program->is_university_test_required == 1) }}
                        <label for="is_university_test_required_yes">Yes Can</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1 text-start" id="submit_button">
        <input type="submit" value="Save Program" name="submit" class="btn btn-success btn-sm">
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#check_box').css('display',
            'none');
        let selected_parent_id = $('#parent_id').val();
        if (selected_parent_id === null) {
            selectedParentId(selected_parent_id)

        }
        $('#parent_id').on('change', function() {
            var parent_id = $(this).val();
            selectedParentId(parent_id)
            // Correct way to get the value
        })

        function selectedParentId(selected_parent_id) {
            $('#check_box').css('display',
                'none');
            if (selected_parent_id !== null) {
                // alert(parent_id)
                // Check if the value is null
                $('#check_box').css('display',
                    'block'); // Correct way to change the CSS display property
            }
        }
        // var parent_id = $('#parent_id');

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
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').on('change', function() {
            var name = $(this).attr('name');
            if ($(this).is(':checked')) {
                $('input[name="' + name + '"]').not(this).prop('checked', false);
            }
        });
    });
</script>
