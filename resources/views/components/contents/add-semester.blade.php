@extends('home')
@section('home-contents')
    <section class="content">
        @if(session()->has('message'))
            <div class="mt-5 alert alert-success" role="alert">
                {{ session()->get('message') }}
            </div>
        @elseif (session()->has('error'))
            <div class="mt-5 alert alert-warning" role="alert">
                {{ session()->get('error') }}
            </div>
         @endif
        <div class="d-flex justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Semester</h3>
                </div>
                <form action={{ route('admin.submit-semester') }} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Semester</label>
                            <select name="semester_number" required class="form-select" aria-label="Default select example">
                                <option >Open this select menu</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">Summer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Semester Title</label>
                            <input name="title" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input name="description" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select name="status" required class="form-select" aria-label="Default select example">
                                <option >Open this select menu</option>
                                <option value="active">Set Active</option>
                                <option value="pending">Set Pending</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
