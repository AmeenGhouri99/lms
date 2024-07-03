<div class="row">
    <div class="d-flex mb-1">
        <a href="#" class="me-25">
            <img src="{{ isset($document) && $document ? asset('storage/' . $document->document) : asset('app-assets/images/no_image_icon.jpg') }}"
                id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100"
                width="100" />
        </a>
        <!-- upload and reset button -->
        <div class="d-flex align-items-end mt-75 ms-1">
            <div>
                <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                <input type="file" id="account-upload" name="document" hidden accept="image/*" />
                <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
            </div>
        </div>
        <!--/ upload and reset button -->
    </div>
    <div class="col-xl-6 col-sm-6 col-12 mb-2 mb-xl-0">
        <label for="name">Select Document Type</label>
        {{ html()->select('document_type', ['' => 'Select Document Type', 'CNIC/B-FORM' => 'CNIC/B-Form Front', 'SCANNED COPY OF LAST DEGREE TRANSCRIPT' => 'Scanned Copy of Last Degree Transcript'])->class('form-control form-control-sm') }}
    </div>
    <div class="col-xl-12 col-sm-6 col-12 mb-2 mb-xl-0 mt-1">
        <input type="submit" value="Save" name="submit" class="btn btn-success btn-sm">
        <a href="{{ route('user.documents.create') }}" class="btn btn-secondary">Cancel </a>
    </div>
    <input type="hidden" name="existing_file" value="{{ $document->document ?? '' }}" id="existing-document">
</div>
@push('js_scripts')
    <script>
        $(document).ready(function() {
            var accountUploadImg = $('#account-upload-img'),
                accountUploadBtn = $('#account-upload'),
                accountResetBtn = $('#account-reset'),
                existingDocument = $('#existing-document').val();

            if (accountUploadImg) {
                var resetImage = accountUploadImg.attr('src');
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
                    accountUploadImg.attr('src', resetImage);
                });
            }
        });
    </script>
@endpush
