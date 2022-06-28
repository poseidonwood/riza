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
                                 <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="">Nama</label>
                                       <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" autofocus>
                                       <small class="text-danger"><?php echo form_error('nama_user'); ?></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="">Email</label>
                                       <input type="text" name="email_user" class="form-control" value="<?php echo set_value('email_user'); ?>">
                                       <small class="text-danger"><?php echo form_error('email_user'); ?></small>
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