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
                    <h3 class="card-title">Add Curriculum Course</h3>
                </div>
                <form action={{ route('admin.submit-curriculum-courses') }} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Course</label>
                            <select name="course_id"  class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @if(count($course) !== 0)
                                    @forelse($course as $index)
                                        <option value = "{{$index->id}}" >{{$index->course_title}}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Year</label>
                            <select name="year_id"  class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @if(count($year) !== 0)
                                    @forelse($year as $index)
                                        <option value = "{{$index->id}}" >{{$index->year_title}}</option>
                                    @empty
                                    @endforelse
                                @endif

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Semester</label>
                            <select name="semester_id"  class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @if(count($semester) !== 0)
                                    @forelse($semester as $index)
                                        <option value = "{{$index->id}}" >{{$index->title}}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Select Curriculum</label>
                            <select name="curriculum_id"  class="form-select" aria-label="Default select example">
                                <option value ="{{ null }}">Open this select menu</option>
                                @if(count($curriculum) !== 0)
                                    @forelse($curriculum as $index)
                                        <option value = "{{$index->id}}" >{{$index->tittle}}</option>
                                    @empty
                                    @endforelse
                                @endif

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Status</label>
                            <select name="status"  class="form-select" aria-label="Default select example">
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
