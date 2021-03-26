@extends('welcome')
@section('content-pages')
    <div>
        <div class="d-flex justify-content-center">
            <form action="{{ route('student-access.grades') }}">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Student number</label>
                    <input required type="text" class="form-control" id="exampleFormControlInput1" placeholder="student number">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Curriculum</label>
                    <select required class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Year</label>
                    <select required class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Course</label>
                    <select required class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Semester</label>
                    <select required class="form-select" aria-label="Default select example">
                        <option selected>Semester</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary">
                </div>
           </form>
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <div class="w-50">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam autem ea optio, ex illo deserunt exercitationem assumenda ullam consequatur cum at velit nihil quas sequi nam quibusdam suscipit placeat quia.</p>
            </div>
        </div>
    </div>
@endsection
