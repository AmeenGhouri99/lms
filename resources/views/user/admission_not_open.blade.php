@include('user.layouts.header')
@section('title', 'No Admission')
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 ">
            <center>
                <img src="{{ asset('app-assets/images/uni.png') }}" style="width: 300px; hieght:300px">
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
