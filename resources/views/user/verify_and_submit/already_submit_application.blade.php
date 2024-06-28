<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Already Submit Application</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}" />

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                Hi <b>{{ auth()->user()->full_name }}</b>
                Your Application is already Submitted, We will confirm your application after review it.
                Thanks Dear
                <br>
                <a href="{{ route('user.home') }}" class="btn btn-primary mt-1">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
