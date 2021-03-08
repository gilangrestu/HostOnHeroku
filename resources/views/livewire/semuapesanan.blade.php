<div class="py-12">
    <link rel="stylesheet" type="text/css" href="stylelogin/css/main.css">
    <link rel="stylesheet" href="assetsdahsboard/css/bootstrap.min.css">
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="assetsdahsboard/css/tooplate-style.css">
    <!-- Main CSS-->
    <link href="card/css/main.css" rel="stylesheet" media="all">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    @livewireStyles
        
        @include('navbar')
    <!-- ABOUT -->
          <div class="limiter">
            <div class="container-login100" style="background-image: url('stylelogin/images/slide_11.jpg');">
              <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                        <div class="about-text">
                            <img style="width: 200px" src="stylelogin/images/logo_white.png" alt="AVATAR">
                            <h1 class="animated animated-text">
                                <span class="mr-2">SELAMAT DATANG </span>
                                    <p class="p-atas">PEMINJAMAN MOBIL DINAS KEBUDAYAAN DAN PARIWISATA</p>
                            </h1>
                            
                            <div class="custom-btn-group mt-4">
                              <a href="#" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Download Resume</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
    
        <!-- PROJECTS -->
        <section class="project py-6" id="project"> 
            <div class="container">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-gray-100">
                          <th>Nama Bidang</th>  
                          <th>Kegiatan</th>
                          <th>Tanggal Dari</th>
                          <th>Tanggal Sampai</th>
                          <th>Mobil Dinas</th>
                          <th>Mobil</th>
                          <th>Bensin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td class="border px-4 py-2">{{ $row->nama_bidang }}</td>
                                <td class="border px-4 py-2">{{ $row->kegiatan }}</td>
                                <td class="border px-4 py-2">{{ $row->tgl_dari }}</td>
                                <td class="border px-4 py-2">{{ $row->tgl_sampai }}</td>
                                <td class="border px-4 py-2">{{ $row->nama }}</td>
                                <td class="border px-4 py-2">{{ $row->status_mobil }}</td>
                                <td class="border px-4 py-2">{{ $row->status_bensin }}</td>
                            </tr>
                        {{-- @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                            </tr> --}}
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </section>
    </div>
        <!-- FOOTER -->
         <footer class="footer py-5">
              <div class="container">
                   <div class="row">
                        <div class="col-lg-12 col-12">                                
                            <p class="copyright-text text-center">© 2021 Website Peminjaman Mobil Dinas Kebudayaan Dan Pariwisata.</p>
                        </div>
                        
                   </div>
              </div>
         </footer>
    
        <script src="assetsdahsboard/js/jquery-3.3.1.min.js"></script>
        <script src="assetsdahsboard/js/popper.min.js"></script>
        <script src="assetsdahsboard/js/bootstrap.min.js"></script>
        <script src="assetsdahsboard/js/Headroom.js"></script>
        <script src="assetsdahsboard/js/jQuery.headroom.js"></script>
        <script src="assetsdahsboard/js/owl.carousel.min.js"></script>
        <script src="assetsdahsboard/js/smoothscroll.js"></script>
        <script src="assetsdahsboard/js/custom.js"></script>
        <script src="card/js/global.js"></script>
        <script>
          var close = document.getElementsByClassName("closebtn");
          var i;
          
          for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
              var div = this.parentElement;
              div.style.opacity = "0";
              setTimeout(function(){ div.style.display = "none"; }, 600);
            }
          }
          </script>
          <!--===============================================================================================-->	
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
                  "responsive": true, "lengthChange": false, "autoWidth": false
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
    
        
          
    