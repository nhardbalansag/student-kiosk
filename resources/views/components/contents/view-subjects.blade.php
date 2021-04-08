@extends('home')
@section('home-contents')
    <div>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Curriculums</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Title</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Units</th>
                    <th>Prereq</th>
                </tr>
                </thead>
                <tbody>
                    @for($index = 0; $index < count($pre['data']); $index++)
                    <tr>
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
                    <th>Subject Code</th>
                    <th>Subject Title</th>
                    <th>Lec</th>
                    <th>Lab</th>
                    <th>Units</th>
                    <th>Prereq</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
@endsection
@push('student-pages-scripts')

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
