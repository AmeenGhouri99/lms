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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
        <h1 class="mt-5">Add Academic Record</h1>
        <form>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="qualification" class="form-label">Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter qualification">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="university" class="form-label">University/Board</label>
                    <input type="text" class="form-control" id="university" name="university" placeholder="Enter university/board">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="rollno" class="form-label">Roll No</label>
                    <input type="text" class="form-control" id="rollno" name="rollno" placeholder="Enter roll no">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="examyear" class="form-label">Exam Year</label>
                    <input type="number" class="form-control" id="examyear" name="examyear" placeholder="Enter exam year">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="totalmarks" class="form-label">Total Marks</label>
                    <input type="number" class="form-control" id="totalmarks" name="totalmarks" placeholder="Enter total marks">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="obtainedmarks" class="form-label">Obtained Marks</label>
                    <input type="number" class="form-control" id="obtainedmarks" name="obtainedmarks" placeholder="Enter obtained marks">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Qualification</button>
        </form>

        <h2 class="mt-5">Academic Records</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Qualification</th>
                    <th scope="col">University/Board</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Exam Year</th>
                    <th scope="col">Total Marks</th>
                    <th scope="col">Obtained Marks</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Records will be dynamically added here -->
            </tbody>
        </table>
    </div>
    <!-- END: Content-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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

    <!-- Add this code inside the script tags at the end of your HTML body -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const tbody = document.querySelector('tbody');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Get form input values
                const qualification = document.getElementById('qualification').value;
                const university = document.getElementById('university').value;
                const rollno = document.getElementById('rollno').value;
                const examyear = document.getElementById('examyear').value;
                const totalmarks = document.getElementById('totalmarks').value;
                const obtainedmarks = document.getElementById('obtainedmarks').value;

                // Create a new row for the table
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${qualification}</td>
                    <td>${university}</td>
                    <td>${rollno}</td>
                    <td>${examyear}</td>
                    <td>${totalmarks}</td>
                    <td>${obtainedmarks}</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                `;

                // Append the new row to the table body
                tbody.appendChild(newRow);

                // Reset form fields
                form.reset();
            });
        });
    </script>

</body>
</html>
