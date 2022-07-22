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
               <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <div class="btn-group">
                  <div class="buttonexport" id="buttonlist">
                     <a class="btn btn-add" href="<?php echo base_url(); ?>admin/add_kelas"> <i class="fa fa-plus"></i> Tambah Kelas
                     </a>
                  </div>
               </div>
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-striped table-hover">
                     <thead>
                        <tr class="info">
                           <th>No</th>
                           <th>Kelas</th>
                           <th>Status</th>
                           <th>Opsi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kelas as $dm) : ?>
                           <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $dm->kelas; ?></td>
                              <td>
                                 <?php if ($dm->status == 0) { ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                 <?php } else { ?>
                                    <span class="label-custom label label-success">Aktif</span>
                                 <?php } ?>
                              </td>
                              <td>
                                 <a href="<?php echo base_url(); ?>admin/edit_kelas/<?php echo $dm->id; ?>" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                 <a href="<?php echo base_url(); ?>admin/delete_kelas/<?php echo $dm->id; ?>" class="btn btn-danger btn-sm bdel"><i class="fa fa-trash-o"></i> </a>
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