<div class="container"> <br></br>
	<h2><?php echo $title; ?></h2>
	<p>Pastikan data yang anda daftarkan valid</p>
	<div class="form">
		<form action="" method="post">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<div class="form-group">
				<label class="control-label" for="input-nama">NIS</label>
				<input type="text" name="nis" placeholder="NIS" id="input-nis" value="<?php echo set_value('nis'); ?>" class="form-control" autofocus>
				<small class="text-danger"><?php echo form_error('nis'); ?></small>
			</div>
			<div class="form-group">
				<label class="control-label" for="input-nama">Kelas</label>
				<select class="form-control" name="kelas">
					<?php
					foreach ($kelas as $kelass) {
						$selecteddata = $sortirclass == $kelass->kelas ? "selected" : NULL;
						echo "<option value='{$kelass->kelas}' {$selecteddata}>{$kelass->nm_kelas}</option>";
					}
					?>
				</select>
				<small class="text-danger"><?php echo form_error('kelas'); ?></small>
			</div>
			<div class="form-group">
				<label class="control-label" for="input-nama">Nama</label>
				<input type="text" name="nama" placeholder="Nama Lengkap" id="input-nama" value="<?php echo set_value('nama'); ?>" class="form-control" required>
				<small class="text-danger"><?php echo form_error('nama'); ?></small>
			</div>
			<div class="form-group">
				<label class="control-label" for="input-email">Email</label>
				<input type="text" name="email" placeholder="E-Mail Aktif" id="input-email" value="<?php echo set_value('email'); ?>" class="form-control">
				<small class="text-danger"><?php echo form_error('email'); ?></small>
			</div>
			<div class="form-group">
				<label class="control-label" for="pass1">Password</label>
				<input type="password" name="pass1" placeholder="Password" id="pass1" class="form-control">
				<small class="text-danger"><?php echo form_error('pass1'); ?></small>
			</div>
			<div class="form-group">
				<label class="control-label" for="input-password">Konfirmasi Password</label>
				<input type="password" name="password" placeholder="Konfirmasi Password" id="input-password" class="form-control">
				<small class="text-danger"><?php echo form_error('password'); ?></small>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info"> Daftar</button>
				Sudah punya akun? <a href="<?php echo base_url(); ?>user/login" class="btn btn-primary"> Login</a>
			</div>
		</form>
	</div>
</div>