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
                  <form action="<?=current_url()?>" method="post">
                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="">NIS</label>
                           <input type="text" name="input[nis]" class="form-control" value="<?php echo set_value('nis'); ?>" autofocus required>
                           <small class="text-danger"><?php echo form_error('nis_user'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="">Email</label>
                           <input type="email" name="input[email_user]" class="form-control" value="<?php echo set_value('email_user'); ?>" required>
                           <small class="text-danger"><?php echo form_error('email_user'); ?></small>
                        </div>
                     </div>

                     <div class="row">
                        <div class="form-group col-md-6">
                           <label for="">Nama</label>
                           <input type="text" name="input[nama_user]" class="form-control" value="<?php echo set_value('nama'); ?>" required>
                           <small class="text-danger"><?php echo form_error('nama_user'); ?></small>
                        </div>

                        <div class="form-group col-md-6">
                           <label for="">Status Akun</label>
                           <select name="input[status_user]" id="" class="form-control">
                              <option value='1' selected>Aktif</option>
                              <option value='2'>Non Aktif</option>
                              <option value='0'>Pending</option>
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