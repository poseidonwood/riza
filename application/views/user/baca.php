<!-- Main content -->
<section class="content">
   <div class="flash-data-home" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <?php if (isset($bacabuku->judul_buku)) { ?>
            <div class="panel panel-bd lobidisable">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4><?php echo $bacabuku->judul_buku; ?></h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="google-maps">
                     <iframe style="height:900px;" src="<?php echo $bacabuku->link_buku; ?>"></iframe>
                  </div>
                  <!-- <iframe src=""></iframe> -->
               </div>
            </div>
         <?php } else { ?>
            <div class="panel-body">
               <h3>Pastikan anda meminjam terlebih dahulu untuk baca buku ini</h3>
               <!-- <iframe src=""></iframe> -->
            </div>
         <?php } ?>
      </div>

   </div>

</section>
<!-- /.content -->