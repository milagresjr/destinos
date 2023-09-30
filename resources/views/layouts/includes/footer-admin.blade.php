</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      {{-- Anything you want --}}
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="#">Destino.ao</a>.</strong> Todos direitos reservados.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/app.min.js') }}"></script>

<script src="{{ asset('admin/dist/js/changeMenu.js') }}"></script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/custom-admin.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/plugins/fastclick/fastclick.js') }}"></script>



<!-- page script -->

<script>

  $(function () {
    $("#tabelaReserva").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('.item-menu').click(function(){

      if($(this).hasClass('active'))
      {

      }else{
        $('.item-menu').removeClass('active');
        $(this).addClass('active');
      }

    });

  });
</script>


</body>
</html>
