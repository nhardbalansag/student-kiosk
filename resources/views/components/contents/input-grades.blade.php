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
                        <div class="card-body">
                          <table class="table table-bordered table-hover">
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
                                @foreach($subjects as $key => $value)
                                    <tr data-widget="expandable-table" aria-expanded="true">
                                        <td>
                                            <div class="form-group" data-select2-id="80">
                                                <select class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select Grade" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                                                    <option>1</option>
                                                    <option>1.25</option>
                                                    <option>1.50</option>
                                                    <option>1.75</option>
                                                    <option>2.00</option>
                                                    <option>2.25</option>
                                                    <option>2.50</option>
                                                    <option>2.75</option>
                                                    <option>3.00</option>
                                                    <option>3.25</option>
                                                    <option>3.50</option>
                                                    <option>3.75</option>
                                                    <option>4.00</option>
                                                    <option>4.25</option>
                                                    <option>4.50</option>
                                                    <option>4.75</option>
                                                    <option>5.00</option>
                                                    <option>W</option>
                                                    <option>D</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>{{ $value->subject_subject_code }}</td>
                                        <td>{{ $value->subject_title }}</td>
                                        <td>{{ $value->subject_lecture_units }}</td>
                                        <td>{{ $value->subject_lab_units }}</td>
                                        <td>{{ $value->subject_total_units }}</td>
                                        <td>English</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary">Check Status</button>
                            <button type="button" class="btn btn-danger">Reset</button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam magnam ea quia laborum consequatur alias optio ratione similique mollitia voluptatum cupiditate animi consectetur voluptates cum laboriosam temporibus debitis, earum ipsum?</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('student-pages-scripts')
    <script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()

          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })

          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
          //Money Euro
          $('[data-mask]').inputmask()

          //Date range picker
          $('#reservationdate').datetimepicker({
              format: 'L'
          });
          //Date range picker
          $('#reservation').daterangepicker()
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
              format: 'MM/DD/YYYY hh:mm A'
            }
          })
          //Date range as a button
          $('#daterange-btn').daterangepicker(
            {
              ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate  : moment()
            },
            function (start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
          )

          //Timepicker
          $('#timepicker').datetimepicker({
            format: 'LT'
          })

          //Bootstrap Duallistbox
          $('.duallistbox').bootstrapDualListbox()

          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()

          $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
          });

          $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
          });

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false;

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
          url: "/target-url", // Set the url
          thumbnailWidth: 80,
          thumbnailHeight: 80,
          parallelUploads: 20,
          previewTemplate: previewTemplate,
          autoQueue: false, // Make sure the files aren't queued until manually added
          previewsContainer: "#previews", // Define the container to display the previews
          clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        });

        myDropzone.on("addedfile", function(file) {
          // Hookup the start button
          file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
          document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });

        myDropzone.on("sending", function(file) {
          // Show the total progress bar when upload starts
          document.querySelector("#total-progress").style.opacity = "1";
          // And disable the start button
          file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
          document.querySelector("#total-progress").style.opacity = "0";
        });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
          myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        };
        document.querySelector("#actions .cancel").onclick = function() {
          myDropzone.removeAllFiles(true);
        };
        // DropzoneJS Demo Code End
    </script>
@endpush



