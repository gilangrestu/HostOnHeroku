<script type="text/javascript">
    function plhbidang()
    {
        var bidang = parseInt(document.form.bidang.value);
        if(bidang==1){ 
            document.form.nip.value = "98609262015051001";
        }else if(bidang==2){ 
            document.form.nip.value = "98609262015051002";
        }else if(bidang==3){ 
            document.form.nip.value = "98609262015051003";
        }else if(bidang==4){ 
            document.form.nip.value = "98609262015051004";
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dinas Kebudayaan dan Pariwisata</title>
    <link rel = "icon" href =  
     "stylelogin/images/logo-pemda.png" 
        type = "image/x-icon"> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="stylelogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="stylelogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="stylelogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="stylelogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="stylelogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="stylelogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="stylelogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="stylelogin/css/main.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="assetsdahsboard/css/tooplate-style.css">
</head>
<body>
	
    @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../stylelogin/images/slide_11.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				@csrf
				<form class="login100-form validate-form" name="form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<div class="login100-form-avatar">
                        <img src="stylelogin/images/logo-pemda.png" alt="AVATAR">
					</div>
					<span class="login100-form-title p-t-20 p-b-45">
						PEMINJAMAN MOBIL DINAS KEBUDAYAAN DAN PARIWISATA
					</span>
					<div class="wrap-input100 validate-input m-b-10">
						<select class="input100" id="bidang" onchange="plhbidang();">
							<option>-- Pilih Bidang --</option>
							<option value="1">Bidang Kebudayaan</option>
							<option value="2">Bidang Pariwisata</option>
							<option value="3">Bidang Kesekertariatan</option>
							<option value="4">Bidang Pemasaran</option>
						  </select>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "NIP harus diisi">
						<input class="input100" type="text" name="nip" placeholder="NIP">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password harus diisi">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>  
				</form>
			</div>
		</div>
	</div>
	
	<footer class="footer py-5">
        <div class="container">
             <div class="row">

                  <div class="col-lg-12 col-12">                                
                      <p class="copyright-text text-center">Copyright &copy; 2019 Company Name . All rights reserved</p>
                      <p class="copyright-text text-center">Designed by <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>
                  </div>
                  
             </div>
        </div>
   </footer>


	
<!--===============================================================================================-->	
	<script src="stylelogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="stylelogin/vendor/bootstrap/js/popper.js"></script>
	<script src="stylelogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="stylelogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="stylelogin/js/main.js"></script>
</body>
</html>