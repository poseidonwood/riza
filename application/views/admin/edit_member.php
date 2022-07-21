<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4><?php echo $title; ?></h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
               <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <div class="form">
                  <form action="" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                     <input type="hidden" name="id" value="<?php echo $userid['id_user']; ?>">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="">NIS</label>
                           <input type="text" name="input[nis]" class="form-control" value="<?php echo $userid['nis']; ?>" autofocus>
                           <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="">Email</label>
                           <input type="text" name="input[email_user]" class="form-control" value="<?php echo $userid['email_user']; ?>">
                           <small class="text-danger"><?php echo form_error('email'); ?></small>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="">Nama</label>
                           <input type="text" name="input[nama_user]" class="form-control" value="<?php echo $userid['nama_user']; ?>" autofocus>
                           <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="">Status Akun</label>
                           <select name="input[status_user]" id="" class="form-control">
                              <?php
                              if ($userid['status_user'] == '1') {
                                 echo "<option value='1' selected>Aktif</option>
                              <option value='2'>Non Aktif</option>
                              <option value='0'>Pending</option>";
                              } else if ($userid['status_user'] == '2') {
                                 echo "<option value='1' selected>Aktif</option>
                              <option value='2' selected>Non Aktif</option>
                              <option value='0'>Pending</option>";
                              } else {
                                 echo "<option value='1'>Aktif</option>
                              <option value='2'>Non Aktif</option>
                              <option value='0' selected>Pending</option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="">Kelas</label>
                           <select name="input[kelas]" id="" class="form-control">
                              <?php
                              foreach ($kelas as $kelass) {
                                 echo "<option value='{$kelass->kelas}'>{$kelass->nm_kelas}</option>";
                              }
                              ?>
                           </select>
                           <small class="text-danger"><?php echo form_error('kat_buku'); ?></small>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>admin/data_member" class="btn btn-warning">Batal</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- /.content -->