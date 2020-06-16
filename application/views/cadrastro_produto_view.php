
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Cadrastra produto</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Validation</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<?php if(validation_errors()): ?>
		<div class="alert alert-danger"><?= validation_errors(); ?></div>
	<?php endif; ?>	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- jquery validation -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Cadrastrar produto</h3>
							<div class="card-tools">
								<!-- Collapse Button -->
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<!-- /.card-header -->
						
						<div class="card-body">
							<!-- form start -->
							<form action="<?= base_url()?>produto/cad_produto" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
								<div class="form-row">
									<div class="col-md-3">
										<a href="#" class="thumbnail">
											<img src="<?= base_url()?>uploads/padrao.jpg" height="190" width="150" id="foto-cliente">
										</a>
									</div>
									<div class="form-group col-md-9" style="margin: auto;">
										<label for="exampleInputFile">Enviar imagem</label>
										<div class="input-group">
											<div class="custom-file" >
												<input type="file" id="foto" class="custom-file-input" id="exampleInputFile" name="up_foto" >
												<label class="custom-file-label" for="exampleInputFile">Click aqui para enviar a imagem do produto</label>
											</div>
											<div class="input-group-append">
												<span class="input-group-text" id="">procurar</span>
											</div>
										</div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputEmail4">Nome do produto</label>
										<input type="text" class="form-control" id="inputEmail4" placeholder="Informe o nome do produto" name="nomeproduto">
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4">Unidade</label>
										<input type="text" class="form-control" id="inputPassword4" placeholder="informe quantas unidades do produto" name="unidade">
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Valor da mercadoria</label>
										<input type="text" class="form-control" id="inputAddress" placeholder="Valalor da mercadoria" name="valormercadoria">
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">valor venda</label>
										<input type="text" class="form-control" id="inputAddress2" placeholder="valor venda" name="valorvenda">
									</div>
									<div class="form-group col-md-4">
										<label for="inputCity">Quantidade no estoque</label>
										<input type="text" class="form-control" id="inputCity" placeholder="Quantidade no estoque" name="qtdeestoque">
									</div>
									<div class="form-group col-md-4">
										<label for="inputState">Desconto</label>
										<select id="inputState" class="form-control" name="descontopermitido">
											<option selected>0</option>
											<option>...</option>
										</select>
									</div>
									<div class="form-group col-md-12">
										<label for="inputEmail4">Descrição do produto</label>
										<textarea name="descricaoproduto" id="" cols="30" rows="8" class="form-control" ></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Salva</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	


<!-- label label -->
<script type="text/javascript" src="<?= base_url()?>assets/js/custom-upload.js"></script>

<!-- modificação manual -->
<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
</script>
