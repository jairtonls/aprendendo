<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title><?= $titulo ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<style type="text/css">
	/* Coded with love by Mutiullah Samim */
	body,
	html {
		margin: 0;
		padding: 0;
		height: 100%;
		background: #333 !important;
	}
	.user_card {
		height: 500px;
		width: 350px;
		margin-top: auto;
		margin-bottom: auto;
		background: #712f26;
		position: relative;
		display: flex;
		justify-content: center;
		flex-direction: column;
		padding: 10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 5px;

	}
	.brand_logo_container{
		position: absolute;
		height: 170px;
		width: 170px;
		top: -75px;
		border-radius: 50%;
		background: #333;
		padding: 10px;
		text-align: center;
	}
	.brand_logo {
		height: 150px;
		width: 150px;
		border-radius: 50%;
		border: 2px solid white;
	}
	.form_container {
		margin-top: 100px;
	}
	.login_btn {
		width: 100%;
		background: #c0392b !important;
		color: white !important;
	}
	.login_btn:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.login_container {
		padding: 0 2rem;
	}
	.input-group-text {
		background: #c0392b !important;
		color: white !important;
		border: 0 !important;
		border-radius: 0.25rem 0 0 0.25rem !important;
	}
	.input_user,
	.input_pass:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
		background-color: #c0392b !important;
	}
	.links{
		color: #fff;
	}
</style>
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="<?= base_url()?>Login/cad_img" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="input-group mb-3">
							<input type="file" name="up_foto" id="up_foto" class="form-control input_user" value="" placeholder="arquivo" onchange="readURL(this);">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="subbmit" name="button" class="btn login_btn">Registrar</button>
						</div>
							<div class="mt-4">
								<div class="d-flex justify-content-center links">
									Ja possui uma conta? <a href="<?= base_url()?>login">Login</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
