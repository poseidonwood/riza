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
               <!-- <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="<?php echo base_url(); ?>admin/add_buku"> <i class="fa fa-plus"></i> New Data
                                 </a>  
                              </div>
                           </div> -->
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-striped table-hover">
                     <thead>
                        <tr class="info">
                           <th>No</th>
                           <th>Nama</th>
                           <th>Tanggal Pinjam</th>
                           <th>Tanggal Kembali</th>
                           <th>Judul Buku</th>
                           <th>Qty Buku</th>
                           <th>Status</th>
                           <!-- id tgl_pinjam_buku tgl_kembali_pinjaman id_buku_pinjaman id_user_pinjaman jml_pinjam status_pinjam -->
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1; ?>
                        <?php
                        if (count($datakembali) > 0) {
                           foreach ($datakembali as $dk) : ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $dk['nama_user']; ?></td>
                                 <td><?php echo $dk['tgl_pinjam_buku']; ?></td>
                                 <td><?php echo $dk['tgl_kembali_pinjaman']; ?></td>
                                 <td><?php echo $dk['judul_buku']; ?></td>
                                 <td><?php echo $dk['jml_pinjam']; ?></td>
                                 <td><?= $dk['status_pinjam'] == 1 ? "<span class='label label-primary'>Dipinjam</>" : "<span class='label label-success'>Dikembalikan</>" ?></td>
                              </tr>
                              <?php $i++; ?>
                           <?php endforeach;
                        }?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- /.content -->