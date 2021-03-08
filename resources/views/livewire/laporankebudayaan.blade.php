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
          
          @if($isModal)
          @include('livewire.gambar')
          @endif   
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Data Laopran Bidang Kebudayaan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-gray-100">
                              <th>Tanggal</th>
                              <th>Mobil</th>
                              <th>Kegiatan</th>
                              <th>Kupon Bensin</th>
                              <th>Gambar Awal</th>
                              <th>Gambar Kegiatan</th>
                              <th>Gambar Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td class="border px-4 py-2">{{ $row->tanggal }}</td>
                                    <td class="border px-4 py-2">{{ $row->mobil }}</td>
                                    <td class="border px-4 py-2">{{ $row->kegiatan }}</td>
                                    <td class="border px-4 py-2">{{ $row->kupon }} Liter</td>
                                    <td class="border px-4 py-2"><img src="{{asset('storage/'.$row->img_awal)}}"></td>
                                    <td class="border px-4 py-2"><img src="{{asset('storage/'.$row->img_kegiatan)}}"></td>
                                    <td class="border px-4 py-2"><img src="{{asset('storage/'.$row->img_akhir)}}"></td>
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
            dom: 'Bfrtip',
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