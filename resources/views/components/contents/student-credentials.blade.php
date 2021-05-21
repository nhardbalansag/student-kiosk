@extends('welcome')
@section('content-pages')

<div>
    <div class="d-flex justify-content-center">
        <form action="{{ route('student-access.input-grades') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Student number</label>
                <input name='studentNumberInfo' required type="text" class="form-control" id="exampleFormControlInput1" placeholder="student number">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input name='student_firstname' required type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                <input name='student_middlename' type="text" class="form-control" id="exampleFormControlInput1" placeholder="Middle Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                <input name='student_lastname' required type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Curriculum</label>
                <select name="curriculuminfo" required class="form-select" aria-label="Default select example">
                    <option value ="{{ null }}">Open this select menu</option>
                    @if($curriculumCourses->count() !== 0)
                        @forelse($curriculumCourses as $index)
                            <option value = "{{$index->id}}" >{{$index->title}}</option>
                        @empty
                        @endforelse
                    @endif
                </select>
            </div>
            <div>
                <input type="submit" class="btn btn-primary">
            </div>
       </form>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        <div>
            <p>to use: Click START, then  select curriculum, afterwards select grades from dropdown in each subject..</p>
        </div>
    </div>
</div>

@endsection
