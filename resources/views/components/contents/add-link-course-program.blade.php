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
                <h3 class="card-title">Link Course Program</h3>
            </div>
            <form action={{ route('admin.submit-link-course-program') }} method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Select Current Curriculum Course Program</label>
                        <select name="curiculum_courses_id_current"  class="form-select" aria-label="Default select example">
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
                        <label for="exampleFormControlInput1" class="form-label">Select Link Curriculum Course Program</label>
                        <select name="curiculum_courses_id_next"  class="form-select" aria-label="Default select example">
                            <option value ="{{ null }}">Open this select menu</option>
                            @if(count($curriculumCourses) !== 0)
                                @forelse($curriculumCourses as $index)
                                    <option value = "{{$index->id}}" >{{$index->title}}</option>
                                @empty
                                @endforelse
                            @endif

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
