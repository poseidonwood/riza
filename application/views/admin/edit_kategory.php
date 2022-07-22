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
                     <input type="hidden" name="id" value="<?php echo $kategory->id; ?>">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label for="">Kelas</label>
                           <input type="text" name="input[nm_kategory]" class="form-control" value="<?php echo $kategory->nm_kategory; ?>" autofocus>
                           <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label for="">Status</label>
                           <select name="input[status]" id="" class="form-control">
                              <?php
                              if ($kategory->status == '1') {
                                 echo "<option value='1' selected>Aktif</option>
                              <option value='0'>Non Aktif</option>";
                              }else {
                                 echo "<option value='1'>Aktif</option>
                              <option value='0' selected>Non Aktif</option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url(); ?>admin/data_kategory" class="btn btn-warning">Batal</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- /.content -->