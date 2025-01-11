    <div class="validate-form mt-2 pt-50 m-1">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="name">Select Program </label>
                {{-- @php
                    $select = ['' => 'Select Program'];
                    $adding_select_program = $select + collect($programs);
                @endphp --}}
                {{ html()->select('program', $programs)->class('form-control form-control-sm') }}
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-1 me-1">Generate Merit List</button>
                <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
            </div>
        </div>
    </div>
