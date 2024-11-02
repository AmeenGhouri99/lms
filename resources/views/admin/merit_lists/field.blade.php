<div class="row">
    <div class="validate-form mt-2 pt-50">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="name">Admission Status </label>
                {{ html()->select('status', ['' => 'Select', 'rejected' => 'REJECTED', 'confirmed' => 'CONFIRMED', 'pending' => 'PENDING', 'in process' => 'IN PROCESS'])->class('form-control form-control-sm') }}
            </div>
            <div class="col-12 col-sm-6">
                <label for="Fee Status">Admission Date </label>
                {{ html()->date('admission_date')->class('form-control form-control-sm') }}
            </div>
            <div class="col-12 col-sm-6">
                <label for="father_name">Admission Term </label>
                {{ html()->select('admission_term', ['' => 'select', 'fall' => 'Fall', 'spring' => 'Spring'])->class('form-control form-control-sm') }}
            </div>
            <div class="col-12 col-sm-6">
                <label for="admission Fee Status">Admission Fee Status </label>
                {{ html()->select('admission_fee', ['' => 'select', 'unpaid' => 'UNPAID', 'paid' => 'PAID'])->class('form-control form-control-sm') }}
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1">Update changes</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
            </div>
        </div>
    </div>
</div>
