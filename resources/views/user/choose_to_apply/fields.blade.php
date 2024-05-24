<div class="row">
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Program Eligible to Apply</label>
        {{-- {{ html()->text('candidate_name')->class('form-control form-control-sm') }} --}}
        <h4>Fsc Pre Aggriculture</h4>
    </div>
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Quota/Category Applied</label>
        <div class="row">
            <div class="col-6">
                {{ html()->text('category_quota_applied')->class('form-control form-control-sm') }}
            </div>
            <div class="col-6">
                <button type="button" value="Select" name="select_qouta" class="btn btn-primary btn-sm"> Select
                </button>
                <button type="button" value="Select" name="applied_to_quota" class="btn btn-success btn-sm"> Applied
                </button>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Action</label>

    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1 text-end">
        <input type="
                                    " value="Save & Go To Next" name="submit"
            class="btn btn-success btn-sm">
    </div>
