<div>
	<h1>Criando um CRUD com CodeIgniter</h1>
</div>
<?php if ($this->session->flashdata('error') == TRUE): ?>
	<p><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
	<p><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>

<form method="post" action="<?=base_url('update')?>" enctype="multipart/form-data">
		<div>
			<label>Name:</label>
			<input type="text" name="name" value="<?=$users['name']?>" required/>
		</div>
		<div>
			<label>Email:</label>
			<input type="email" name="email" value="<?=$users['email']?>" required/>
		</div>
		<div>
			<label>Password:</label>
			<input type="password" name="password" value="<?=$users['pwd']?>" required/>
		</div>
		<div>
			<label>Type:</label>
			<input type="type" name="type" value="<?=$users['type']?>" required/>
		</div>
	<div>
		<input type="hidden" name="id" value="<?=$users['id']?>"/>
		<input type="submit" value="Save" />
	</div>
</form>