<!-- HTML Document -->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui" />
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="PIXINVENT" />
    <title>Academic Record</title>
    <link rel="apple-touch-icon" href="{{asset('newdata/uni.png')}}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('newdata/uni.png')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet" />

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}" />
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}" />

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-ecommerce.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}" />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />
    <!-- END: Custom CSS-->

</head>
<body>

    <!-- BEGIN: Content-->
    <div class="text-center">
        <img src="{{asset('newdata/uni.png')}}" alt="LOGO" style="height: 50px; width:50px;">
        <h2 class="brand-text text-primary ms-1">University</h2>
    </div>

    <div class="container">
        <h1 class="mt-5">Student Information</h1>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="student_name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter student name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_name" class="form-label">Father/Guardian Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter father/guardian name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_occupation" class="form-label">Father/Guardian Occupation</label>
                    <input type="text" class="form-control" id="father_occupation" name="father_occupation" placeholder="Enter father/guardian occupation">
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
                    <input type="text" class="form-control" id="disability" name="disability" placeholder="Enter any disability">
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
                    <input type="number" class="form-control" id="annual_income" name="annual_income" placeholder="Enter annual household income">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="religion" class="form-label">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter religion">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="student_cnic" class="form-label">Student CNIC</label>
                    <input type="text" class="form-control" id="student_cnic" name="student_cnic" placeholder="Enter student CNIC">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="father_cnic" class="form-label">Father/Guardian CNIC</label>
                    <input type="text" class="form-control" id="father_cnic" name="father_cnic" placeholder="Enter father/guardian CNIC">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="monthly_income" class="form-label">Father/Guardian Monthly Income</label>
                    <input type="number" class="form-control" id="monthly_income" name="monthly_income" placeholder="Enter father/guardian monthly income">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter state">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="domicile" class="form-label">Domicile</label>
                    <input type="text" class="form-control" id="domicile" name="domicile" placeholder="Enter domicile">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="mobile_number" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter mobile number">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="emergency_number" class="form-label">Emergency Number</label>
                    <input type="text" class="form-control" id="emergency_number" name="emergency_number" placeholder="Enter emergency number">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="permanent_address" class="form-label">Permanent Address</label>
                    <input type="text" class="form-control" id="permanent_address" name="permanent_address" placeholder="Enter permanent address">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Information</button>
        </form>
    </div>

    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on("load", function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14,
                });
            }
        });
    </script>

</body>
</html>
