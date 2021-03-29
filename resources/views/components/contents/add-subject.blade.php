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
                    <h3 class="card-title">Add Subject</h3>
                </div>
                <form action={{ route('admin.submit-subject') }} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Subject Title</label>
                            <input name="title" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Subject Code</label>
                            <input name="subject_code" type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <input name="description" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Total Units</label>
                            <input name="total_units" type="numeric" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Lecture Units</label>
                            <input name="lecture_units" type="numeric" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Lab Units</label>
                            <input name="lab_units" type="numeric" class="form-control" >
                        </div>

                        @if(count($subjectList) !== 0)
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Prerequisite Subject</label>
                            <select name="subject_id" class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @forelse($subjectList as $index)
                                    <option value = "{{$index->id}}" >{{$index->title}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        @endif
                        
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
