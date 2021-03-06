@extends('welcome')
@section('content-pages')
    <div>
        <div class="row col-12 col-md-12">
            <div class="my-5 card-header">
                <div class="col-12 col-md-12">
                    <div class="row col-12 col-md-8">
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Student Number</span>
                            <p class="font-weight-light">{{ $output['student_number'] }}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Student Name</span>
                            <p class="font-weight-light text-capitalize">{{ $output['student_lastname'] . ", " . $output['student_firstname'] . " " . $output['student_middlename'] }}</p>
                        </div>
                    </div>
                    <div class="row col-12 col-md-8">
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Course</span>
                            <p class="font-weight-light">{{ $output['course_title'] }} ({{ $output['course_code'] }})</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <span class="font-weight-bold">Curriculum</span>
                            <p class="font-weight-light">{{ $output['course_curriculum_title'] }}</p>
                        </div>
                        <div class="col-12 col-md-2">
                            <span class="font-weight-bold">Year</span>
                            <p class="font-weight-light">{{ $output['student_years_title'] }}</p>
                        </div>
                        <div class="col-12 col-md-3">
                            <span class="font-weight-bold">Semester</span>
                            <p class="font-weight-light">{{ $output['semesters_title'] }}</p>
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
                            @if(count($output['comply']) > 0)
                                @for($index = 0; $index < count($output['comply']); $index++)
                                    <li class="text-capitalize">{{ $output['comply'][$index]['subject']['subject_title'] }}</li>
                                @endfor
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
                            @if(count($output['retake']) > 0)
                                @for($index = 0; $index < count($output['retake']); $index++)
                                    <li class="text-capitalize">{{ $output['retake'][$index]['subject']['subject_title'] }}</li>
                                @endfor
                            @endif
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <p class="text-primary">Total Subject Passed: {{ $output['passed'] }}</p>
                        </div>
                        <div>
                            <p class="text-danger">Total Subject Failed: {{ count($output['comply']) + count($output['retake'])}}</p>
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
                        @for($index = 0; $index < count($output['next_subject']['data']); $index++)
                            <li class="text-capitalize">{{ $output['next_subject']['data'][$index]['subject']['subject_title'] }}</li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="row no-print">
            <div class="col-12">
                <a
                    href="{{ route('student-access.print',['inquiryId' => $output['inquiryId']]) }}"
                    rel="noopener"
                    target="_blank"
                    class="btn btn-default">
                    <i class="fas fa-print"></i>
                    Print
                </a>
            </div>
        </div>
    </div>
@endsection
