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
    <title>Login Page</title>
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
    <div class="outer-card">
        <div class="card inner-card">
            <h4 class="card-title text-center mt-3"><img src="{{asset('newdata/uni.png')}}" alt="LOGO" style="height: 50px; width:50px;">Welcome to Our University!</h4>
            <p class="card-text text-center mb-4">Explore the world of knowledge and opportunities at our esteemed university.</p>
            <h5 class="card-title text-center mb-3">Student Education Details</h5>
            <ul class="list-group">
                <li class="list-group-item">Name: John Doe</li>
                <li class="list-group-item">Course: Bachelor of Science in Computer Science</li>
                <li class="list-group-item">Year: 3rd Year</li>
                <li class="list-group-item">GPA: 3.8</li>
            </ul>
            <hr>
            <h5 class="card-title text-center mb-3">University Information</h5>
            <p class="card-text text-center mb-2"><strong>Contact:</strong> +123-456-7890</p>
            <p class="card-text text-center mb-2"><strong>Email:</strong> info@university.edu</p>
            <p class="card-text text-center mb-2"><strong>Address:</strong> 123 University Street, City, Country</p>
            <p class="card-text text-center mb-0"><strong>Campus Details:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fringilla lectus ut erat luctus, vitae malesuada turpis lacinia.</p>
        </div>
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
