<div class="d-flex">
    <a href="{{ $admission->admissionFee->chalan_pic ? asset('storage/' . $admission->admissionFee->chalan_pic) : asset('app-assets/no-image-icon.png') }}"
        data-lightbox="admission-image" class="me-25">
        <img src="{{ $admission->admissionFee->chalan_pic ? asset('storage/' . $admission->admissionFee->chalan_pic) : asset('app-assets/no-image-icon.png') }}"
            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
    </a>
</div>
<table class="table table-bordered mt-2">
    <thead>
        <tr>
            <th>Sr#</th>
            <th>Program Name</th>
            <th>Status</th>
            <th>Change Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admission->program as $applied_program)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $applied_program->program->name }}</td>
            <td>{{ $applied_program->status }}</td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCard">
                    Change Status
                </button>
            </td>
        @endforeach
        {{-- <td><span class="badge bg-success">{{ $admission->admission_fee }}</span></td> --}}
    </tbody>
</table>
<table class="table table-bordered mt-2">
    <thead>
        <tr>
            <th>Transaction Id</th>
            <th>Challan No</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <td>{{ $admission->admissionFee->transaction_id }}</td>
        <td>{{ $admission->admissionFee->chalan_no }}</td>
        <td>{{ $admission->admissionFee->amount }}</td>
        <td>{{ $admission->admissionFee->payment_method }}</td>
        @if ($admission->admission_fee === 'unpaid')
            <td><span class="badge bg-danger">{{ $admission->admission_fee }}</span></td>
        @else
            <td><span class="badge bg-success">{{ $admission->admission_fee }}</span></td>
        @endif
        {{-- <td><span class="badge bg-success">{{ $admission->admission_fee }}</span></td> --}}
    </tbody>
</table>

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
<!--/ form -->
<!-- add new card modal  -->
<div class="modal fade" id="addNewCard" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Change the Applied Program Status</h1>
                <p class="text-center">You can change the applied status</p>
                <!-- form -->
                <form action="" class="row gy-1 gx-2 mt-75" onsubmit="return false">
                    <div class="col-12">
                        <label class="form-label" for="modalAddCardNumber">Change Status</label>
                        <select name="status" class="form-control">
                            <option value="" selected disabled>Change Status</option>
                            <option value="in_process">IN PROCESS</option>
                            <option value="confirmed">CONFIRMED</option>
                            <option value="pending">PENDING</option>
                            <option value="cancel">CANCEL</option>
                        </select>
                    </div>
                    <input type="hidden" value="here will be the slected id will show">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ add new card modal  -->
@push('js_scripts')
    <script src="{{ asset('app-assets/js/lightbox.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var form = $('.validate-form'),
                accountUploadImg = $('#account-upload-img'),
                accountUploadBtn = $('#account-upload'),
                accountUserImage = $('.uploadedAvatar'),
                accountResetBtn = $('#account-reset');

            // Update user photo on click of button

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
@endpush
