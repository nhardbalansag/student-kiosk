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
                  <th>Semester</th>
                  <th>Status</th>
                  <th>View</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($semester as $key => $index)
                    <tr>
                        <td class="font-weight-bolder">{{ $index->title }}</td>
                        <td>{{ $index->status }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="/admin/report/view-subject/{{ $index->curriculum_courses_id }}" role="button">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Semester</th>
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
