<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
<!-- END: Page JS-->

<script>
    $(window).on("load", function() {
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
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const tbody = document.querySelector('tbody');

        form.addEventListener('submit', function(event) {
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
@stack('js_scripts')

</body>

</html>
