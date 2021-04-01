@extends('welcome')
@section('content-pages')

@livewire('input-curriculum',['curriculum' => $curriculumCourses])

@endsection
