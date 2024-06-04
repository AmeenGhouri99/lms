<div class="row">
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Program Eligible to Apply</label>
        <select class="form-control form-control-sm" id="degree_level_to_apply" name="degree_level_to_apply">
            <option value="" selected disabled>Select Degree Level to apply</option>
            @foreach ($degree_levels as $degree_level)
                <option value="{{ $degree_level->id }}"> {{ $degree_level->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div id="programs">
    <div class="row">
        <div class="col-12 text-white"></div>
        <div id="show_program"></div>
        <div id="error_message" class="text-danger mt-2"></div>
    </div>
    <div id="selected_programs" class="col-12 mt-2"></div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1 text-end" id="submit_button" style="display: none">
        <input type="submit" value="Save & Go To Next" name="submit" class="btn btn-success btn-sm">
    </div>
</div>
@push('js_scripts')
    <script>
        $(document).ready(function() {
            let selectedPrograms = [];

            $('#degree_level_to_apply').on('change', function() {
                let program = $(this).val();
                let show_program = $('#show_program');
                show_program.empty();
                let error_message = $('#error_message');
                error_message.empty();

                $.ajax({
                    type: 'GET',
                    url: "{{ route('user.choose-program-to-apply.index') }}",
                    data: {
                        program: program,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status === false) {
                            error_message.html(response.message);
                        } else {
                            displayPrograms(response.data);
                        }
                    },
                    error: function(response) {
                        error_message.html(
                            'An error occurred while fetching programs. Please try again later.'
                        );
                    }
                });
            });

            function displayPrograms(data) {
                let show_programs = '';

                $.each(data, function(index, group) {
                    show_programs += `<div class="col-12 mt-2"><h4>${group.title}</h4></div>`;

                    if (group.programs.length > 0) {
                        $.each(group.programs, function(index, program) {
                            show_programs += `
                                <div class="col-4">
                                    <input type="checkbox" name="programs[]" value="${program.id}" id="program-${program.id}">
                                    <label for="program-${program.id}">${program.name}</label>
                                </div>
                            `;
                        });
                    } else {
                        show_programs +=
                            `<div class="col-12"><p>No programs available for ${group.title}</p></div>`;
                    }
                });

                $('#show_program').html(show_programs);

                // Bind the change event to the new checkboxes
                $('input[name="programs[]"]').on('change', handleProgramSelection);
            }

            function handleProgramSelection() {
                if (this.checked) {
                    if (selectedPrograms.length < 2) {
                        selectedPrograms.push($(this).val());
                    } else {
                        this.checked = false;
                        alert('You can only apply to two programs.');
                    }
                } else {
                    selectedPrograms = selectedPrograms.filter(function(value) {
                        return value != $(this).val();
                    }.bind(this));
                }
                displaySelectedPrograms();
            }

            function displaySelectedPrograms() {
                let submit_button = $('#submit_button');
                if (selectedPrograms.length > 0) {
                    submit_button.show();
                } else {
                    submit_button.hide();
                }
                let selectedText = selectedPrograms.length > 0 ? 'You have selected the following programs: ' : '';
                selectedPrograms.forEach(function(programId, index) {
                    selectedText += `<span>${$('#program-' + programId).next('label').text()}</span>`;
                    if (index < selectedPrograms.length - 1) {
                        selectedText += ', ';
                    }
                });
                $('#selected_programs').html(selectedText);
            }
        });
    </script>
@endpush
