<div class="py-12">
        <link rel="stylesheet" type="text/css" href="stylelogin/css/main.css">
        <link rel="stylesheet" href="assetsdahsboard/css/bootstrap.min.css">
        <!-- MAIN STYLE -->
        <link rel="stylesheet" href="assetsdahsboard/css/tooplate-style.css">
        <!-- Main CSS-->
        <link href="card/css/main.css" rel="stylesheet" media="all">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="table/css/util.css">
        <link rel="stylesheet" type="text/css" href="table/css/main_pemesanananda.css">
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
          @if($isModal)
          @include('livewire.kupon')
          @endif    
          <!-- PROJECTS -->
          <section class="project py-5" id="project"> 
            <div class="container">
                <table>
                    <thead>
                        <tr class="table100-head">
                          <th class="column1">Kegiatan</th>
                          <th class="column1">Tanggal Dari</th>
                          <th class="column1">Tanggal Sampai</th>
                          <th class="column1">Mobil Dinas</th>
                          <th class="column1">Mobil</th>
                          <th class="column1">Bensin</th>
                          <th class="column1">Kupon</th>
                          <th class="column1">Pembatalan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td class="column1">{{ $row->kegiatan }}</td>
                                <td class="column1">{{ $row->tgl_dari }}</td>
                                <td class="column1">{{ $row->tgl_sampai }}</td>
                                <td class="column1">{{ $row->nama }}</td>
                                <td class="column1">{{ $row->status_mobil }}</td>
                                <td class="column1">{{ $row->status_bensin }}</td>
                                <td class="column1">
                                  @if ($row->status_bensin == 'Disetujui')
                                    <button type="button" wire:click="kupon({{ $row->kupon }},'{{ $row->updated_at }}','{{ $row->nama_bidang }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lihat</button>
                                  @else
                                    <button type="button" wire:click="kupon({{ $row->kupon }},'{{ $row->updated_at }}','{{ $row->nama_bidang }}')" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" disabled>Lihat</button>
                                  @endif
                                </td>
                                <td class="column1">
                                    <button type="button" onclick="confirm('Konfirmasi Pembatalan') || event.stopImmediatePropagation()" wire:click="batal({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                                </td>
                            </tr>
                              {{-- <tr>
                                <td class="column1">Tidak ada data</td>
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
          <script src="table/vendor/jquery/jquery-3.2.1.min.js"></script>
          <!--===============================================================================================-->
            <script src="table/vendor/bootstrap/js/popper.js"></script>
            <script src="table/vendor/bootstrap/js/bootstrap.min.js"></script>
          <!--===============================================================================================-->
            <script src="table/vendor/select2/select2.min.js"></script>
          <!--===============================================================================================-->
            <script src="table/js/main.js"></script>
        
    
        
          
    