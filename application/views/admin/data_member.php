<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4>Sortir Data By Kelas</h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
               <form action="<?= current_url() ?>" method="POST">
                  <div class="form-group">
                     <select name="sortirclass" id="" class="form-control">
                        <?php
                        foreach ($kelas as $kelass) {
                           $selecteddata = $sortirclass == $kelass->kelas ? "selected" : NULL;
                           echo "<option value='{$kelass->kelas}' {$selecteddata}>{$kelass->nm_kelas}</option>";
                        }
                        ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-list"></i> Sortir</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4><?php echo $title; ?></h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
               <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <div class="btn-group">
                  <div class="buttonexport" id="buttonlist">
                     <a class="btn btn-add" href="<?php echo base_url(); ?>admin/add_member"> <i class="fa fa-plus"></i> Tambah Data
                     </a>
                  </div>
               </div>
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-striped table-hover">
                     <thead>
                        <tr class="info">
                           <th>No</th>
                           <th>NIS</th>
                           <th>Kelas</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>Member Sejak</th>
                           <th>Status</th>
                           <th>Opsi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datamember as $dm) : ?>
                           <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $dm['nis']; ?></td>
                              <td><?php echo $dm['kelas']; ?></td>
                              <td><?php echo $dm['nama_user']; ?></td>
                              <td><?php echo $dm['email_user']; ?></td>
                              <td><?php echo date('d-m-Y H:i:s', $dm['akun_dibuat']); ?></td>
                              <td>
                                 <?php if ($dm['status_user'] == 0) { ?>
                                    <span class="label label-primary">Pending</span>
                                 <?php } else if ($dm['status_user'] == 2) { ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                 <?php } else { ?>
                                    <span class="label-custom label label-success">Aktif</span>
                                 <?php } ?>
                              </td>
                              <td>
                                 <a href="<?php echo base_url(); ?>admin/edit_member/<?php echo $dm['id_user']; ?>" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                 <a href="<?php echo base_url(); ?>admin/delete_member/<?php echo $dm['id_user']; ?>" class="btn btn-danger btn-sm bdel"><i class="fa fa-trash-o"></i> </a>
                              </td>
                           </tr>
                           <?php $i++; ?>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- /.content -->