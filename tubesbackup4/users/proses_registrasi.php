<?php 
		$user = $_POST['username'];
		$pass = $_POST['password'];

		include 'koneksi.php';
		$query_validasi = "SELECT * FROM tb_user WHERE username= '$user' ";
		$query = mysqli_query($conn, $query_validasi);

		if (mysqli_num_rows($query)==0) {
			$query_mhs_register = mysqli_query($conn,"INSERT INTO tb_user (username,password) VALUES ('$user','$pass')");
			if ($query_mhs_register) { ?>
				<script>
					alert("Register Behasil Dilakukan, silakan Login");
					window.location.assign("index.php");
				</script>
			<?php }
		}else{
			?>
				<script> 
					alert("Username yang anda gunakan sudah terdaftar");
					window.location.assign("");
				</script>
			<?php
		}?>