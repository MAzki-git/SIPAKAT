{{--
<!-- jQuery --> --}}
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
{{--
<!-- jQuery UI 1.11.4 --> --}}
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
{{--
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> --}}
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
{{--
<!-- Bootstrap 4 --> --}}
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{--
<!-- ChartJS --> --}}
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
{{--
<!-- Sparkline --> --}}
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
{{--
<!-- JQVMap --> --}}
<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
{{--
<!-- jQuery Knob Chart --> --}}
<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
{{--
<!-- daterangepicker --> --}}
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
{{--
<!-- Tempusdominus Bootstrap 4 --> --}}
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
{{--
<!-- Summernote --> --}}
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
{{--
<!-- overlayScrollbars --> --}}
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
{{--
<!-- AdminLTE App --> --}}
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
{{--
<!-- AdminLTE for demo purposes --> --}}
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
{{-- Datatables js --}}
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
{{-- @yield('js') --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    @if (Session::has('success'))
Swal.fire({
title: 'Success!',
text: '{{ session('success') }}',
icon: 'success',
confirmButtonText: 'OK'
});
@endif
</script>

<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

{{-- confirm delete --}}
<script>
    $(document).ready(function() {
  // Add event listener to delete button
  $('.delete-btn').click(function(event) {
    event.preventDefault();
    var url = $(this).attr('href');

    // Show SweetAlert confirmation dialog
    Swal.fire({
      title: 'Apakah anda yakin?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'hapus ini!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Redirect to the delete URL if confirmed
        window.location.href = url;
      }
    })
  });
});
</script>

{{-- //datepicker --}}
<script>
    $(document).ready(function(){
    flatpickr("#datepicker", {
    dateFormat: "Y/m/d",
    maxDate: "today",
    allowInput: true
    });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>