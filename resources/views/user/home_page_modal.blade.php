<div class="modal fade" id="shareProject" tabindex="-1" aria-labelledby="shareProjectTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        @php
            $admission_picture = settings('admission_picture');
        @endphp
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-4">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="{{ isset($admission_picture) ? asset('storage/' . $admission_picture) : null }}"
                            class="img-fluid" style="border: 1px solid black">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
