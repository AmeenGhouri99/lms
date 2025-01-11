<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @section('title', 'Admission not open')
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-sm-12">
                <center> <img src="{{ asset('app-assets/images/uni.png') }}" style="width: 300px; height:300px">
                    <h1>Following Details about the Admissions are give below</h1>
                    <h2>
                        Admission Dates <br></h2>
                    <h4><b>Admission Start Date:</b> {{ settings('admission_start_date') }}</h4>
                    <h4><b>Admission End Date:</b>{{ settings('admission_end_date') }}</h4>
                    <a href="https://mnsuet.edu.pk/" class="btn btn-success">Back to Home</a>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
