<!-- BEGIN: Content-->
<div class="text-center">
    <img src="{{ asset('newdata/uni.png') }}" alt="LOGO" style="height: 50px; width:50px;">
    <h2 class="brand-text text-primary ms-1">University</h2>
</div>
<div class="container">
    <h1 class="mt-5">Add Academic Record</h1>
    <form>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="qualification" class="form-label">Qualification</label>
                <input type="text" class="form-control" id="qualification" name="qualification"
                    placeholder="Enter qualification">
            </div>
            <div class="col-md-4 mb-3">
                <label for="university" class="form-label">University/Board</label>
                <input type="text" class="form-control" id="university" name="university"
                    placeholder="Enter university/board">
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
                <input type="number" class="form-control" id="totalmarks" name="totalmarks"
                    placeholder="Enter total marks">
            </div>
            <div class="col-md-4 mb-3">
                <label for="obtainedmarks" class="form-label">Obtained Marks</label>
                <input type="number" class="form-control" id="obtainedmarks" name="obtainedmarks"
                    placeholder="Enter obtained marks">
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
