     <?php
		session_start();
		if ($_SESSION) {
			header("Location: operator.php");
		} elseif ($_SESSION) {
			header("Location: admin.php");
		}
		include '../class/admin.php';
		$admin = new admin();
		if (isset($_SESSION['Login'])) {
			header("location:index.php");
		}
		if (isset($_POST['Login'])) {
			$login = $admin->login_admin($_POST['username'], $_POST['password']);
			if ($login) {
				if ($_SESSION['level'] == "1") {
					header("location: admin.php");
				} else if ($_SESSION['level'] == "2") {
					header("location: operator.php");
				}
			} else {
		?>
     		<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
     		<script type="text/javascript">
     			alert("Login Gagal .");
     			window.location.href = "index.php"
     		</script> <?php
						}
					}
							?>
     <!DOCTYPE html>
     <html lang="en">

     <head>
     	<meta charset="utf-8">
     	<title>Admin BT</title>
     	<meta name="description" content="description">
     	<meta name="author" content="Evgeniya">
     	<meta name="keyword" content="keywords">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
     	<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
     	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
     	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
     	<link href="css/style.css" rel="stylesheet">
     </head>

     <body>
     	<div class="container-fluid">
     		<div id="page-login" class="row">
     			<div class="form-login" style="width: 300px;">
     				<div class="box">
     					<div class="box-content">
     						<div class="text-center">
     							<h3 class="page-header">Login Ke Admin LUQEFOTO</h3>
     						</div>
							<img src="../images/logo/Logo Hitam.png" alt="" style="width: 100%;">
     						<form role="form" action="" method="post">
     							<div class="form-group">
     								<label class="control-label">Username</label>
     								<input type="text" class="form-control" name="username" autofocus required />
     							</div>
     							<div class="form-group">
     								<label class="control-label">Password</label>
     								<input type="password" class="form-control" name="password" required />
     							</div>
     							<input type="submit" name="Login" class="btn btn-primary btn-block" value="Log in" />
     						</form>
     					</div>
     				</div>
     			</div>
     		</div>
     	</div>
     </body>

     </html>