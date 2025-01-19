@include('flash::message')
<div class="d-flex justify-content-end mb-1">
    <a href="{{ $user ? asset('storage/' . $user->personalInformation->profile_image) : asset('app-assets/no-image-icon.png') }}"
        data-lightbox="admission-image" class="me-25"> <img
            src="{{ isset($user) && $user ? asset('storage/' . $user->personalInformation->profile_image) : asset('app-assets/images/no_image_icon.jpg') }}"
            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
    </a>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Application </title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table th,
        .table td {
            width: 25%;
        }

        .text-center {
            text-align: center;
        }

        @media (max-width: 576px) {

            .table th,
            .table td {
                font-size: 0.875rem;
                /* Smaller text for small screens */
                padding: 6px;
                /* Reduce padding */
                word-wrap: break-word;
            }

            .table th[colspan="4"],
            .table th[colspan="8"] {
                font-size: 1rem;
                /* Keep header slightly larger */
            }

            .uploadedAvatar {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th colspan="4">Personal Information</th>
                    </tr>
                </thead>
                <tr>
                    <th>Full Name</th>
                    <th style="font-weight: 100">{{ $user->personalInformation->candidate_name }}</th>
                    <th>Father's Name</th>
                    <th style="font-weight: 100">{{ $user->personalInformation->father_name }}</th>
                </tr>
                {{-- </thead> --}}
                <tbody>
                    <tr>
                        <td>CNIC</td>
                        <td style="font-weight: 100">{{ $user->personalInformation->candidate_cnic }}</td>
                        <td>Cell No</td>
                        <td style="font-weight: 100">{{ $user->personalInformation->phone_no }}</td>
                    </tr>
                    {{-- <thead> --}}
                    <tr>
                        <th>Email Address</th>
                        <th style="font-weight: 100">{{ $user->personalInformation->email }}</th>
                        <th>Mailing Address</th>
                        <th style="font-weight: 100">{{ $user->personalInformation->permanent_address }}</th>
                    </tr>
                    {{-- </thead> --}}
                    <tr>
                        <td>Hafiz e Quran</td>
                        <td style="font-weight: 100">{{ $user->personalInformation->hafiz_e_quran }}</td>
                        <td>Gender</td>
                        <td style="font-weight: 100">{{ $user->personalInformation->gender }}</td>
                    </tr>
                    {{-- <thead> --}}
                    <tr>
                        <th>Date of Birth</th>
                        <th style="font-weight: 100">{{ $user->personalInformation->dob }}</th>
                        <th>Nationality</th>
                        <th style="font-weight: 100">{{ $user->personalInformation->country->name }}</th>
                    </tr>
                    {{-- </thead> --}}
                    <tr>
                        <td>Province</td>
                        <td style="font-weight: 100">{{ $user->personalInformation->state->name }}</td>
                        <td>Guardian/Emg.</td>
                        <td style="font-weight: 100">{{ $user->personalInformation->guardian_father_cnic }}</td>
                    </tr>
                    {{-- <thead> --}}
                    <tr>
                        <th>Current Address</th>
                        <th style="font-weight: 100">{{ $user->personalInformation->address }}</th>
                        <th>Permanent Address</th>
                        <th style="font-weight: 100">{{ $user->personalInformation->permanent_address }}</th>
                    </tr>
                </tbody>
                {{-- </thead> --}}
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th colspan="4"><b>Applied Programs</b></th>
                    </tr>
                </thead>
                {{-- <thead> --}}
                <tr>
                    <th>#sr</th>
                    <th>Program Name</th>
                    <th>Application Status</th>
                    <th>Admission Date</th>
                </tr>
                {{-- </thead> --}}
                <tbody>
                    @php
                        $admission_id = '';
                    @endphp
                    @foreach ($user->appliedProgram->where('admission_id', auth()->check() && auth()->user()->role_id === 2 ? request()->route('id') : request()->route('admission')) as $program)
                        @php
                            $admission_id = $program->admission->id;
                        @endphp
                        <tr>
                            <td style="font-weight: 100">{{ $loop->iteration }}</td>
                            <td style="font-weight: 100">{{ $program->program->name }}</td>
                            <td style="font-weight: 100">{{ $program->status }}</td>
                            <td style="font-weight: 100">{{ $program->admission->admission_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            {{-- <thead> --}}
            <thead>
                <tr class="text-center">
                    <th colspan="8"><b>Qualifications</b></th>
                </tr>
            </thead>
            <tr>
                <th>#sr</th>
                <th>Qualification</th>
                {{-- <th>Board/University</th> --}}
                <th>Roll No</th>
                <th>Passing Year</th>
                <th>Obtained Marks</th>
                <th>Total Marks</th>
                <th>%age</th>
                <th>Image</th>
            </tr>
            {{-- </thead> --}}
            <tbody>
                @foreach ($user->qualification as $qualification)
                    <tr>
                        <td style="font-weight: 100">{{ $loop->iteration }}</td>
                        <td style="font-weight: 100">{{ $qualification->qualification }}</td>
                        {{-- <td style="font-weight: 100">{{ $qualification->board_university_name }}</td> --}}
                        <td style="font-weight: 100">{{ $qualification->roll_no }}</td>
                        <td style="font-weight: 100">{{ $qualification->degree_exam_year }}</td>
                        <td style="font-weight: 100">{{ $qualification->obtained_marks }}</td>
                        <td style="font-weight: 100">{{ $qualification->total_marks }}</td>
                        <td>{{ number_format(($qualification->obtained_marks / $qualification->total_marks) * 100) }} %
                        </td>
                        <td> <a href="{{ $qualification->image ? asset('storage/' . $qualification->image) : asset('app-assets/no-image-icon.png') }}"
                                data-lightbox="admission-image" class="me-25"><img
                                    src="{{ asset('storage') . '/' . $qualification->image }}"
                                    style="width: 80px; height:80px"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th colspan="4"><b>Attached Documents</b></th>
                </tr>
            </thead>
            {{-- <thead> --}}
            <tr>
                <th style="width: 100px;">#sr</th>
                <th style="width: calc(100% - 100px);">Document Type</th>
                <th style="width: calc(100% - 100px);">Document </th>

            </tr>
            {{-- </thead> --}}
            <tbody>
                @foreach ($user->document as $document)
                    <tr>
                        <td style="font-weight: 100; width: 100px;">{{ $loop->iteration }}</td>
                        <td style="font-weight: 100; width: calc(100% - 100px);">{{ $document->document_type }}</td>
                        <td> <a href="{{ $document->document ? asset('storage/' . $document->document) : asset('app-assets/no-image-icon.png') }}"
                                data-lightbox="admission-image" class="me-25"><img
                                    src="{{ asset('storage') . '/' . $document->document }}"
                                    style="width: 80px; height:80px"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (auth()->check() && auth()->user()->role_id === 2)
        <h4 class="mt-1 text-bold">UNDERTAKING</h4>
        <ol class="text-danger">
            <li>I declare that I am not a member of any political party and that I shall not indulge in any political
                activity as long as I remain a student of the University. I further undertake that I will not challenge
                the
                finding /decision of Head of the Institution regarding my Rustication /Expulsion from the University or
                cancellation of my admission at any stage whatsoever in any Court, Tribunal, Authority or Forum other
                than
                the Supreme Court of Pakistan.</li>
            <li>I further undertake that I shall not claim hostel accommodation as a matter of right.</li>
            <li>I hereby certify that I have myself filled in this form and the statements made herein are correct.</li>
            <li>I hereby declare on oath that I have not been on the rolls of any teaching department of the university.
            </li>
            <li>I hereby declare that I am not student or have not got admission in any other Degree Program in any
                university.</li>
        </ol>
        @php
            $is_undertaking_accept = 0;
        @endphp
        @foreach ($user->admission as $admission)
            @php
                $is_undertaking_accept = $admission->is_undertaking_accept;
            @endphp
        @endforeach
        @if ($is_undertaking_accept === 0)
            <input type="hidden" value="{{ $admission_id }}" name="admission_id">
            <input type="checkbox" id="acceptAll" name="accept_all" required class="form-checkbox-input"value="1">
            <label for="acceptAll">I accept all the undertakings listed above.</label><br><br>
            <button type="submit" class="btn btn-success" name="submit">Submit Application</button>
        @else
            <span class="alert alert-success">Your Application is already submit</span><br>
            <a class="btn btn-primary btn-sm" href="{{ route('user.home') }}">Back To Home</a>
        @endif
    @endif
</body>

</html>
