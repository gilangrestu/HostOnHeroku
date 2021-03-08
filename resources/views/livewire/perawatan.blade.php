<div class="py-12">
    <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css')}}">
    
      <link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
      <link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/css/util.css">
        <link rel="stylesheet" type="text/css" href="table/css/main.css">
        <!-- Theme style -->
      @livewireStyles
    </head>
    @include('admin.navbar')
    <body class="hold-transition sidebar-mini">
      <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="../../index3.html" class="brand-link">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>
          <!-- Sidebar -->
          @include('Tameplate.left-sidebar')  
          <!-- /.sidebar -->
        </aside>
    
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Laporan</h1>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
    
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Data Perwatan Mobil Dinas Kebudayaan dan Parawista Banyuwangi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table-auto w-full">
                        <thead>
                            <tr class="table100-head">
                              <th class="column1">Nama Mobil</th>
                              <th class="column1">Status</th>
                              <th class="column1">Aksi</th>
                              <th class="column1">Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td class="column1">{{ $row->nama }}</td>
                                    <td class="column1">{{ $row->status }}</td>
                                    <td class="column1">
                                        <button type="button" wire:click="perawatan({{ $row->id_mobil }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Perwatan</button>
                                        <div wire:loading wire:target="perawatan">
                                            Loading...
                                        </div>
                                    </td>
                                    <td class="column1">
                                        <button type="button" wire:click="selesai({{ $row->id_mobil }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Selesain</button>
                                        <div wire:loading wire:target="selesai">
                                            Loading...
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content -->
        </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            @include('Tameplate.footer')  
          </footer>
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
      <!-- /.control-sidebar -->
      </div>
    <!-- ./wrapper -->
    
    
    <!-- jQuery -->
    <script src="{{ asset('Admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('Admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('Admin/dist/js/adminlte.min.js')}}" ></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('Admin/dist/js/demo.js')}}"></script>
    <!-- Page specific script -->
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
    </body>
    </html>
    </div>