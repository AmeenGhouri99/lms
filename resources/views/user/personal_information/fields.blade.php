<div class="row">
    <div class="d-flex mb-1">
        <a href="#" class="me-25">
            <img src="{{ isset($user) && $user ? asset('storage/' . $user->profile_image) : asset('app-assets/images/no_image_icon.jpg') }}"
                id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100"
                width="100" />
        </a>
        <div class="d-flex align-items-end mt-75 ms-1">
            <div>
                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                <input type="file" id="account-upload" name="profile_image" hidden accept="image/*" />
                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Candidate Name <span class="text-danger">*(According to the
                Martriculation
                Certificate)</label>
        {{ html()->text('candidate_name')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Candidate CNIC <span class="text-danger">*(without dashes (-))
            </span></label>
        {{ html()->text('candidate_cnic')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Father's Name<span class="text-danger">*(According to the
                Martriculation
                Certificate)</span></label>
        {{ html()->text('father_name')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Guardian/Father CNIC <span class="text-danger">* (without
                dashes
                (-)) </span></label>
        {{ html()->text('guardian_father_cnic')->class('form-control form-control-sm')->placeholder('Guardian/Father CNIC') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Guardian/Father Occupation <span class="text-danger">*</span></label>
        {{ html()->text('guardian_father_occupation')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Guardian/Father Monthly Income in Rs.<span class="text-danger">*</span></label>
        {{ html()->text('guardian_father_monthly_income_in_rs')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Annual household Income for all source in Rs. <span class="text-danger">*</span></label>
        {{ html()->text('annual_household_income')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Religion <span class="text-danger">*</span></label>
        {{ html()->select('religion', ['islam' => 'Islam', 'hindu' => 'Hindu', 'christan' => 'Christan'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Hafiz e Quran <span class="text-danger">*</span></label>
        {{ html()->select('hafiz_e_quran', ['' => 'Select', 'yes' => 'Yes', 'no' => 'No'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">any Disability <span class="text-danger">*</span></label>
        {{ html()->select('disability', ['' => 'Select', 'yes' => 'Yes', 'no' => 'No'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Gender <span class="text-danger">*</span></label>
        {{ html()->select('gender', ['' => 'Select', 'male' => 'Male', 'female' => 'Female', 'other' => 'Other'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Date of Birth <span class="text-danger">*(It will decide your
                eligibility)</span></label>
        {{ html()->date('dob')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Country <span class="text-danger">*</span></label>
        {{ html()->select('country', ['' => 'Select Country'] + $countries->toArray())->class('form-control form-control-sm')->attribute('id', 'country_id') }}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Province <span class="text-danger">*</span></label>
        {!! html()->select('province', ['' => 'Select Province'])->id('state_select_box')->class('form-control form-control-sm') !!}
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Domicile <span class="text-danger">*</span></label>
        {{ html()->select('domicile', ['' => 'Select Domicile'])->id('domicile_select_box')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Phone No <span class="text-danger">*(without -
                Dashes)</span></label>
        {{ html()->text('phone_no')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Guardian/Emg. Contact <span class="text-danger">*</span></label>
        {{ html()->text('phone_no')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Email ID <span class="text-danger">*</span></label>
        {{ html()->email('email')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Address <span class="text-danger">*</span></label>
        {{ html()->text('address')->id('address')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Permanent Address <span class="text-danger"><input type="checkbox"
                    id="check_same_as_above">(same as above)
                *</span></label>
        {{ html()->text('permanent_address')->id('permanent_address')->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1 text-end">
        <a href="{{ url('home') }}" class="btn btn-primary"><i data-feather='arrow-left'></i>Back</a>
        <input type="submit" name="submit" value="Save & Go To Next" class="btn btn-success btn-sm" />

    </div>
    @push('js_scripts')
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

            $('#country_id').on('change', function() {
                let country_id = $(this).val();
                let state_select_box = $('#state_select_box');

                $.ajax({
                    type: 'GET',
                    url: "{{ route('user.state') }}",
                    data: {
                        country_id: country_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response.data);

                        // Clear the existing options
                        state_select_box.empty();

                        // Append the default option
                        state_select_box.append('<option value="">Select Province</option>');

                        // Check if response status is true and data is present
                        if (response.status === true && response.data.length > 0) {
                            // Loop through the states data and append each option to the select box
                            $.each(response.data, function(index, state) {
                                state_select_box.append('<option value="' + state.id + '">' + state
                                    .name + '</option>');
                            });
                        } else {
                            // If no states found, you can handle the message here
                            state_select_box.append('<option value="">No states available</option>');
                        }
                    },
                    error: function(response) {
                        // Handle error case
                        console.error('Error:', response);
                    }
                });
            });
            $('#state_select_box').on('change', function() {
                let state_id = $(this).val();
                let domicile_select_box = $('#domicile_select_box');

                $.ajax({
                    type: 'GET',
                    url: "{{ route('user.domicile') }}",
                    data: {
                        state_id: state_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response.data);

                        // Clear the existing options
                        domicile_select_box.empty();

                        // Append the default option
                        domicile_select_box.append('<option value="">Select Province</option>');

                        // Check if response status is true and data is present
                        if (response.status === true && response.data.length > 0) {
                            // Loop through the states data and append each option to the select box
                            $.each(response.data, function(index, state) {
                                domicile_select_box.append('<option value="' + state.id + '">' +
                                    state
                                    .name + '</option>');
                            });
                        } else {
                            // If no states found, you can handle the message here
                            domicile_select_box.append('<option value="">No Domicile available</option>');
                        }
                    },
                    error: function(response) {
                        // Handle error case
                        console.error('Error:', response);
                    }
                });
            });
            $('#check_same_as_above').click(function() {
                if (this.checked) {
                    let address = $('#address').val();
                    $('#permanent_address').val(address);
                } else {
                    $('#permanent_address').val('');
                }
            })
        </script>
        </script>
    @endpush
