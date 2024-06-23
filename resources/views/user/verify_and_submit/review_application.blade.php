@include('flash::message')
<div class="d-flex justify-content-end mb-1">
    <a href="#" class="me-25 text-right mt-1">
        <img src="{{ isset($user) && $user ? asset('storage/' . $user->personalInformation->profile_image) : asset('app-assets/images/no_image_icon.jpg') }}"
            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
    </a>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equal Table</title>
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
    </style>
</head>

<body>
    <table class="table">
        {{-- <tr>
            <td rowspan="4">Personal Information</td>

        </tr> --}}
        <thead>
            <tr>
                <th>Full Name</th>
                <th style="font-weight: 100">{{ $user->personalInformation->candidate_name }}</th>
                <th>Father's Name</th>
                <th style="font-weight: 100">{{ $user->personalInformation->father_name }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>CNIC</td>
                <td style="font-weight: 100">{{ $user->personalInformation->candidate_cnic }}</td>
                <td>Cell No</td>
                <td style="font-weight: 100">{{ $user->personalInformation->phone_no }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Email Address</th>
                <th style="font-weight: 100">{{ $user->personalInformation->email }}</th>
                <th>Mailing Address</th>
                <th style="font-weight: 100"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hafiz e Quran</td>
                <td style="font-weight: 100">{{ $user->personalInformation->hafiz_e_quran }}</td>
                <td>Gender</td>
                <td style="font-weight: 100">{{ $user->personalInformation->gender }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Date of Birth</th>
                <th style="font-weight: 100">{{ $user->personalInformation->dob }}</th>
                <th>Nationality</th>
                <th style="font-weight: 100">{{ $user->personalInformation->country_id }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Province</td>
                <td style="font-weight: 100">{{ $user->personalInformation->state_id }}</td>
                <td>Guardian/Emg.</td>
                <td style="font-weight: 100">{{ $user->personalInformation->guardian_father_cnic }}</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Current Address</th>
                <th style="font-weight: 100">{{ $user->personalInformation->address }}</th>
                <th>Permanent Address</th>
                <th style="font-weight: 100">{{ $user->personalInformation->permanent_address }}</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td colspan="4"><b>Applied Programs</b></td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>#sr</th>
                <th>Program Name</th>
                <th>Application Status</th>
                <th>Admission Date</th>
            </tr>
        </thead>
        <tbody>
            @php
                $admission_id = '';
            @endphp
            {{-- {{ session('admission_id') }} --}}
            {{-- @dd($admission_id) --}}
            @foreach ($user->appliedProgram->where('admission_id', request()->id) as $program)
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
    <table class="table">
        <thead>
            <tr>
                <th>#sr</th>
                <th>Qualification</th>
                <th>Board/University</th>
                <th>Roll No</th>
                <th>Passing Year</th>
                <th>Obtained Marks</th>
                <th>Total Marks</th>
                <th>%age</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->qualification as $qualification)
                <tr>
                    <td style="font-weight: 100">{{ $loop->iteration }}</td>
                    <td style="font-weight: 100">{{ $qualification->qualification }}</td>
                    <td style="font-weight: 100">{{ $qualification->board_university_name }}</td>
                    <td style="font-weight: 100">{{ $qualification->roll_no }}</td>
                    <td style="font-weight: 100">{{ $qualification->degree_exam_year }}</td>
                    <td style="font-weight: 100">{{ $qualification->obtained_marks }}</td>
                    <td style="font-weight: 100">{{ $qualification->total_marks }}</td>
                    <td>{{ number_format(($qualification->obtained_marks / $qualification->total_marks) * 100) }} %
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table" style="width: 100%;">
        <thead>
            <tr>
                <th style="width: 100px;">#sr</th>
                <th style="width: calc(100% - 100px);">Document</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->document as $document)
                <tr>
                    <td style="font-weight: 100; width: 100px;">{{ $loop->iteration }}</td>
                    <td style="font-weight: 100; width: calc(100% - 100px);">{{ $document->document_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4 class="mt-1 text-bold">UNDERTAKING</h4>
    <ol class="text-danger">
        <li>I declare that I am not a member of any political party and that I shall not indulge in any political
            activity as long as I remain a student of the University. I further undertake that I will not challenge the
            finding /decision of Head of the Institution regarding my Rustication /Expulsion from the University or
            cancellation of my admission at any stage whatsoever in any Court, Tribunal, Authority or Forum other than
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
</body>

</html>
