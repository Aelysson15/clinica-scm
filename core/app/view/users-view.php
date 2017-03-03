<div class="row">
	<div class="col-md-12">

<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Usuários</h4>
  </div>
  <div class="card-content table-responsive">


	<a href="index.php?view=newuser" class="btn btn-default"><i class='fa fa-user'></i> Novo Usuário</a>
<br>
		<?php
		/*
		$u = new UserData();
		print_r($u);
		$u->name = "jose";
		$u->lastname = "dionisio";
		$u->email = "j.aelysson@gmail.com";
		$u->password = sha1(md5("123"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
		?>
		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// se existirem usuários
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nome completo</th>
			<th>Nome de usuário</th>
			<th>E-mail</th>
			<th>Ativo</th>
			<th>Admin</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
					<td><?php echo $user->name." ".$user->lastname; ?></td>
					<td><?php echo $user->username; ?></td>
					<td><?php echo $user->email; ?></td>
					<td>
						<?php if($user->is_active):?>
							<i class="fa fa-check"></i>
						<?php endif; ?>
					</td>
					<td>
						<?php if($user->is_admin):?>
							<i class="fa fa-check"></i>
						<?php endif; ?>
					</td>
					
					<td style="width:200px;">
						<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
						<a href="index.php?view=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Excluir</a>
					</td>
				</tr>

				<?php

			}
			?>
			</table>
			<?php



		}else{
			// nenhum usuário
		}


		?>

</div>
</div>
	</div>
</div>