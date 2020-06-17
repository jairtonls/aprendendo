<!-- /.content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Tabela de produtos</h3>
							<div class="card-tools">
								<!-- Collapse Button -->
								<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<th>foto</th>
										<th>nome</th>
										<th>unidade</th>
										<th>valor da mercadoria</th>
										<th>valor de venda</th>
										<th>quantidade estoque</th>
										<th>desconto</th>
										<th>descrição</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($produtos as $produto):?>
										<tr>
											<td></td>
											<td>
												<a href="<?=base_url()?>produto/produto_edit/<?=$produto['id']?>"><i class="fas fa-edit"></i></a>
												<a href="javascript:deletardatabase(<?=$produto['id'] ?>)"><i class="fas fa-trash"></i></a>
											</td>
											<td><img src="<?=base_url()?>/uploads/<?=$produto['img']?>" alt="img" height="100" width="90"></td>
											<td><?=$produto['nomeproduto']?></td>
											<td><?=$produto['unidade']?></td>
											<td><?=$produto['valormercadoria']?></td>
											<td><?=$produto['valorvenda']?></td>
											<td><?=$produto['qtdeestoque']?></td>
											<td><?=$produto['descontopermitido']?></td>
											<td><?=$produto['descricaoproduto']?></td>
										</tr>
									<?php endforeach; ?>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/tabela/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/tabela/responsive.bootstrap4.css">
<!-- DataTables -->
<script src="<?= base_url()?>assets/js/tabela/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/js/tabela/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/js/tabela/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/js/tabela/responsive.bootstrap4.min.js"></script>
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	});
	function deletardatabase(id) {
		if(confirm("voce deseja realmente excluir este arquivo")){
			window.location.href = 'produto_delit/'+id;
		}else{
			alert("registro nao excluido");
			return false;
		}
	}
</script>