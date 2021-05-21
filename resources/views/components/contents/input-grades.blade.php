@extends('welcome')
@section('content-pages')
    <div>
        <div class="p-1 card card-default">
            <div class="card-header">
                <h3 class="card-title">Available Subjects for ({{ $student_number }})</h3>
            </div>
            <div class="p-2 card card-default" >
                <div class="card-header">
                    <div class="d-flex flex-column">
                        <div>
                            <p class="card-title">{{ $info->course_title }} ({{ $info->course_code }})</p>
                        </div>
                        <div>
                            <p class="card-title">Effective Academic {{ $info->course_curriculum_title }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="">
                        <div class="card-header">
                            <div class="row col-12 col-md-12">
                                <div class="col-12 col-md-3">
                                    <span class="font-weight-bold">Student Number</span>
                                    <p class="font-weight-light">{{ $student_number }}</p>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span class="font-weight-bold">Curriculum</span>
                                    <p class="font-weight-light">{{ $info->course_curriculum_title }}</p>
                                </div>
                                <div class="col-12 col-md-2">
                                    <span class="font-weight-bold">Year</span>
                                    <p class="font-weight-light">{{ $info->student_years_title }}</p>
                                </div>
                                <div class="col-12 col-md-2">
                                    <span class="font-weight-bold">Course</span>
                                    <p class="font-weight-light">{{ $info->course_code }}</p>
                                </div>
                                <div class="col-12 col-md-2">
                                    <span class="font-weight-bold">Semester</span>
                                    <p class="font-weight-light">{{ $info->semesters_title }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- ./card-header -->
                        <form action="{{ route('student-access.submit-grade-input', ['studentNumber' => $student_number]) }}" method="post">
                            @csrf
                            <input name="curriculum_course_id" type="text" value={{ $info->curriculum_courses_id }} hidden>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Final Grade</th>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th>Lec</th>
                                        <th>Lab</th>
                                        <th>Units</th>
                                        <th>Prereq</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for($index = 0; $index < count($pre['data']); $index++)
                                            <tr aria-expanded="true">
                                                <td>
                                                    <div class="form-group" data-select2-id="80">
                                                        <select name="{{ 'input_' .  $index }}" required class="form-select" aria-label="Default select example">
                                                            <option value="1.0">1.0</option>
                                                            <option value="1.1">1.1</option>
                                                            <option value="1.2">1.2</option>
                                                            <option value="1.3">1.3</option>
                                                            <option value="1.4">1.4</option>
                                                            <option value="1.5">1.5</option>
                                                            <option value="1.6">1.6</option>
                                                            <option value="1.7">1.7</option>
                                                            <option value="1.8">1.8</option>
                                                            <option value="1.9">1.9</option>
                                                            <option value="2">2</option>
                                                            <option value="2.1">2.1</option>
                                                            <option value="2.2">2.2</option>
                                                            <option value="2.3">2.3</option>
                                                            <option value="2.4">2.4</option>
                                                            <option value="2.5">2.5</option>
                                                            <option value="2.6">2.6</option>
                                                            <option value="2.7">2.7</option>
                                                            <option value="2.8">2.8</option>
                                                            <option value="2.9">2.9</option>
                                                            <option value="3">3</option>
                                                            <option value="5">5</option>
                                                            <option value="inc">INCOMPLETE</option>
                                                            <option value="hna">HNA</option>
                                                            <option value="w">WITHDRAWAL</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>{{ $pre['data'][$index]['subject']['subject_subject_code'] }}</td>
                                                <td>{{ $pre['data'][$index]['subject']['subject_title'] }}</td>
                                                <td>{{ $pre['data'][$index]['subject']['subject_lecture_units'] }}</td>
                                                <td>{{ $pre['data'][$index]['subject']['subject_lab_units'] }}</td>
                                                <td>{{ $pre['data'][$index]['subject']['subject_total_units'] }}</td>
                                                <td>{{ $pre['data'][$index]['pre']['pre_subj_code'] }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Final Grade</th>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th>Lec</th>
                                        <th>Lab</th>
                                        <th>Units</th>
                                        <th>Prereq</th>
                                    </tr>
                                    </tfoot>
                                  </table>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="mr-3">
                                        <button type="submit" id="checkStatus" type="button" class="btn btn-primary">Check Status</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Above is the List of of required subject for the semester</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('student-pages-scripts')

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>

@endpush




