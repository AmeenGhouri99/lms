@extends('user.layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="container">
        <h1 class="mt-1">Student Information</h1>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="student_name" class="form-label">Student First Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name"
                        placeholder="Enter student name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_name" class="form-label">Father/Guardian Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name"
                        placeholder="Enter father/guardian name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_occupation" class="form-label">Father/Guardian Occupation</label>
                    <input type="text" class="form-control" id="father_occupation" name="father_occupation"
                        placeholder="Enter father/guardian occupation">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="hafiz_e_quran" class="form-label">Hafiz-e-Quran</label>
                    <select class="form-select" id="hafiz_e_quran" name="hafiz_e_quran">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="disability" class="form-label">Any Disability</label>
                    <input type="text" class="form-control" id="disability" name="disability"
                        placeholder="Enter any disability">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="annual_income" class="form-label">Annual Household Income</label>
                    <input type="number" class="form-control" id="annual_income" name="annual_income"
                        placeholder="Enter annual household income">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="religion" class="form-label">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter religion">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="student_cnic" class="form-label">Student CNIC</label>
                    <input type="text" class="form-control" id="student_cnic" name="student_cnic"
                        placeholder="Enter student CNIC">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_cnic" class="form-label">Father/Guardian CNIC</label>
                    <input type="text" class="form-control" id="father_cnic" name="father_cnic"
                        placeholder="Enter father/guardian CNIC">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="monthly_income" class="form-label">Father/Guardian Monthly Income</label>
                    <input type="number" class="form-control" id="monthly_income" name="monthly_income"
                        placeholder="Enter father/guardian monthly income">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country"
                        placeholder="Enter country">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter state">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="domicile" class="form-label">Domicile</label>
                    <input type="text" class="form-control" id="domicile" name="domicile"
                        placeholder="Enter domicile">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                        placeholder="Enter mobile number">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="emergency_number" class="form-label">Emergency Number</label>
                    <input type="text" class="form-control" id="emergency_number" name="emergency_number"
                        placeholder="Enter emergency number">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        placeholder="Enter address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="permanent_address" class="form-label">Permanent Address</label>
                    <input type="text" class="form-control" id="permanent_address" name="permanent_address"
                        placeholder="Enter permanent address">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Information</button>
        </form>
    </div>
    <!-- End: Content-->
@endsection
