<table class="table table-white-space">
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
            <th>CNIC</th>
            <th style="font-weight: 100">{{ $user->personalInformation->candidate_cnic }}</th>
            <th>Cell No</th>
            <th style="font-weight: 100">{{ $user->personalInformation->phone_no }}</th>
        </tr>
    </tbody>
</table>
