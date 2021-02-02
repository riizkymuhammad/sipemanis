<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100" style="padding:40px;">
			<div class="login100-pic js-tilt">
				<center><img src="img/logo_ict.png" alt="IMG"></center>
			</div>
			<form class="login100-form validate-form" action="" method="post">
				<span class="login100-form-title" style="padding:40px;">
					Form Login
				</span>
				<?php
					echo $this->session->flashdata('msg');
				?>
				<div class="wrap-input100 validate-input" data-validate = "Username is required">
					<input class="input100" type="text" placeholder="Username SIPA " name="username" autofocus>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
					<input class="input100" type="password" placeholder="Password SIPA " name="password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" name="btnlogin" class="login100-form-btn">
						Login
					</button>
				</div>
				<div class="container-login100-form-btn">
					<a href="./"  >Kembali</a>
				</div>

				<hr>
				<!-- <div class="text-center p-t-136"> -->
					<!--a class="txt2" href="web/user_register.html">
						Buat Akun Pengguna Baru
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a-->
				<!-- </div> -->
				<!-- <div class="text-center p-t-136"></div> -->
			</form>
		</div>
	</div>
</div>
