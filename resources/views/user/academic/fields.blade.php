<div class="row">
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Select Your Qualification:</label>
        {{ html()->select('qualification', ['' => 'Select', 'matriculation' => 'Matriculation', 'marticulation_with_science' => 'Matriculation With Science', 'ordinary_level' => 'Ordinary Level'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Select University/Board:</label>
        {{ html()->select('board_university_name', ['' => 'Select', 'dg_khan_board' => 'Dg Khan Board', 'multan_board' => 'Multan Board', 'sargodha_board' => 'Sargodha Board'])->class('form-control form-control-sm') }}
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
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0 mt-1">
        <input type="submit" value="Save Qualification" name="submit" class="btn btn-success">
    </div>
