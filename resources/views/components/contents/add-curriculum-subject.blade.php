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
                <form action={{ route('admin.submit-curriculum-subject') }} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Curriculum Courses</label>
                            <select name="curiculum_courses_id"  class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @if(count($curriculumCourses) !== 0)
                                    @forelse($curriculumCourses as $index)
                                        <option value = "{{$index->id}}" >{{$index->title}}</option>
                                    @empty
                                    @endforelse
                                @endif

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Subject</label>
                            <select name="subject_id"  class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @forelse($subject as $index)
                                    <option value = "{{$index->id}}" >{{$index->title}}</option>
                                @empty
                                @endforelse
                            </select>
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
