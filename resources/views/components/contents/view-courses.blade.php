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
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($courses as $key => $index)
                    <tr>
                        <td class="font-weight-bolder">{{ $index->course_code }}</td>
                        <td>{{  $index->course_title }}</td>
                        <td>{{  $index->course_status }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="/admin/report/view-year/{{ $index->curricula_id }}/{{ $index->course_id }}" role="button">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Status</th>
                    <th>View</th>
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
