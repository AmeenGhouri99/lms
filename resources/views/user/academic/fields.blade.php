<div class="row">
    <div class="d-flex mb-1">
        <a href="#" class="me-25">
            <img src="{{ isset($academic_detail) && $academic_detail ? asset('storage/' . $academic_detail->image) : asset('app-assets/images/no_image_icon.jpg') }}"
                id="account-upload-img" class="uploadedAvatar rounded me-50" alt="degree image" height="100"
                width="100" />
        </a>
        <div class="d-flex align-items-end mt-75 ms-1">
            <div>
                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                <input type="file" id="account-upload" name="degree_image" hidden accept="image/*" />
                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Select Your Qualification:</label>
        {{ html()->select('qualification', ['' => 'Select', 'matriculation' => 'Matriculation', 'fsc_pre_engineering' => 'Fsc Pre Engineering', 'fsc_pre_medical' => 'Fsc Pre Medical', 'fa_simple' => 'FA Simple', 'fa_with_math_or_it' => 'FA Math/IT', 'dae_electical' => 'DAE Electrical', 'dae_mechanical' => 'DAE Mechanical', 'dae_civil' => 'DAE Civil', 'dae_chemical' => 'DAE Chemical', 'i_com' => 'ICom', 'bs' => 'Bachelor In Science', 'bs' => 'BA', 'ma' => 'MA', 'm_phil' => 'M Phil'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Select University/Board:</label>
        {{ html()->select('board_university_name', ['' => 'Select'] + $board_unis->toArray(), isset($academic_detail) ? $academic_detail->board_university_id : null)->attribute('id', 'select_university_board')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0" id="other_university_board" style="display: none;">
        <label for="other_board_university_name">Enter Other University/Board:</label>
        {{ html()->text('other_board_university_name', isset($academic_detail) ? $academic_detail->other_board_university_name : null)->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Enter Roll No:</label>
        {{ html()->text('roll_no')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Enter Degree Exam Year:</label>
        {{ html()->date('degree_exam_year')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Enter Total Marks:</label>
        {{ html()->text('total_marks')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Enter Obtained Marks:</label>
        {{ html()->text('obtained_marks')->class('form-control form-control-sm') }}
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0 mt-1">
        <input type="submit" value="Save Qualification" name="submit" class="btn btn-success">
        <a href="{{ route('user.academic-information.create') }}" class="btn btn-warning">
            Back
        </a>
    </div>
</div>
@push('js_scripts')
    <script>
        $(document).ready(function() {
            $('#total_marks, #obtained_marks').on('input', function() {
                let total_marks = parseFloat($('#total_marks').val());
                let obtained_marks = parseFloat($('#obtained_marks').val());
                if (isNaN(total_marks) || isNaN(obtained_marks)) {
                    return;
                }

                if (total_marks < obtained_marks) {
                    alert('Obtained Marks Must Not Be Greater than Total Marks');
                    $('#obtained_marks').val('');
                }
            });

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
            let selected_inst = $('#select_university_board').val();
            selected_board_university(selected_inst);
            $('#select_university_board').on('change', function() {
                selected_board_university($(this).val());
            });

            function selected_board_university(selected_institute) {
                if (selected_institute == 124) {
                    $('#other_university_board').show();
                } else {
                    $('#other_university_board').hide();
                }
            }

            // Trigger change event on page load to handle pre-selected option
            $('#select_university_board').trigger('change');
        });
    </script>
@endpush
