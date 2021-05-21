@extends('welcome')
@section('content-pages')
    <div>
        <div class="row col-12 col-md-12">
            <div class="my-5 card-header">
                <div class="col-12 col-md-12">
                    <div class="row col-12 col-md-8">
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Student Number</span>
                            <p class="font-weight-light">{{ $studentInfo->student_number }}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Student Name</span>
                            <p class="font-weight-light text-capitalize">{{ $studentInfo->student_lastname . ", " . $studentInfo->student_firstname . " " . $studentInfo->student_middlename }}</p>
                        </div>
                    </div>
                    <div class="row col-12 col-md-8">
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Course</span>
                            <p class="font-weight-light">{{ $curriculum->course_title }} ({{ $curriculum->course_code }})</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Curriculum</span>
                            <p class="font-weight-light">{{ $curriculum->course_curriculum_title }}</p>
                        </div>
                        <div class="col-12 col-md-2">
                            <span class="font-weight-bold">Year</span>
                            <p class="font-weight-light">{{ $curriculum->student_years_title }}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Semester</span>
                            <p class="font-weight-light">{{ $curriculum->semesters_title }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div>
                    <div>
                        <h3>List of subjects to comply:</h3>
                    </div>
                    <div>
                        <ul>
                            @if($comply->count() > 0)
                                @forelse($comply as $key => $value)
                                    <li class="text-capitalize">{{ $value->subject_title }}</li>
                                @empty
                                @endforelse
                            @endif
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <h3>List of subjects to retake:</h3>
                    </div>
                    <div>
                        <ul>
                            @if($retake->count() > 0)
                                @forelse($retake as $key => $value)
                                    <li class="text-capitalize">{{ $value->subject_title }}</li>
                                @empty
                                @endforelse
                            @endif
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p class="text-primary">Total Subject Passed: {{ $passed->passedCount }}</p>
                        </div>
                        <div>
                            <p class="text-danger">Total Subject Failed: {{ $comply->count() + $retake->count()}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div>
                    <h3>List  of available subjects to take for the next semester</h3>
                </div>
                <div>
                    <ul>
                        @forelse($next_subject as $key => $value)
                            <li class="text-capitalize">{{ $value->subject_title }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <script>
        window.addEventListener("load", window.print());
    </script>
@endsection
