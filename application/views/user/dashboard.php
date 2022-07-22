<!-- Main content -->
<section class="content">
   <div class="flash-data-home" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
   <div class="row">
      <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
         <div id="cardbox1">
            <div class="statistic-box">
               <i class="fa fa-users fa-3x"></i>
               <div class="counter-number pull-right">
                  <span class="count-number"><?php echo $m_aktif; ?></span>
                  <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                  </span>
               </div>
               <h3> Member Aktif</h3>
            </div>
         </div>
      </div> -->
      <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
         <a href="<?= base_url('home') ?>">
            <div id="cardbox2">
               <div class="statistic-box">
                  <i class="fa fa-book fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number"><?php echo $totalbuku; ?></span>
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3> Total Buku</h3>
               </div>
            </div>
         </a>
      </div> -->

   </div>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
               <div class="panel-title">
                  <h4>Buku Pinjamanku</h4>
               </div>
            </div>
            <div class="panel-body">
               <?php
               if (count($datapinjaman) > 0) {
                  foreach ($datapinjaman as $dp) : ?>
                     <?php if ($dp['tgl_kembali_pinjaman'] == date('Y-m-d')) { ?>
                        <div class="work-touchpoint">
                           <p>Tanggal Kembali</p>
                           <div class="work-touchpoint-date">
                              <span class="day"><?php echo date('d', strtotime($dp['tgl_kembali_pinjaman'])); ?></span>
                              <span class="month"><?php echo substr(date('F', strtotime($dp['tgl_pinjam_buku'])), 0, 3); ?></span>
                           </div>
                        </div>
                        <div class="detailswork">
                           <a href="#" title="Klik untuk mengembalikan buku"><span class="label-danger label label-default pull-right">Kembalikan</span></a>
                           <a href="#" title="Klik untuk mulai membaca"><?php echo $dp['judul_buku']; ?></a> <br>
                           <p><?php echo $dp['kategori_buku']; ?> karya <?php echo $dp['penulis_buku']; ?></p>
                        </div>
                     <?php } else { ?>
                        <div class="detailswork">
                           <div class="btn-group pull-right" role="group">
                              <!-- <a href="<?php echo base_url(); ?>user/baca/detail/<?php echo $dp['url_buku']; ?>" title="Klik untuk mulai membaca" class='text-white btn btn-primary' ">Baca</a> -->
                              <?php
                              if ($dp['status_pinjam'] == 1) { ?>
                                 <a href="<?php echo base_url(); ?>user/dashboard/kembalikan/<?php echo $dp['id_buku_pinjaman']; ?>" class='btn btn-success' title="Klik untuk mengembalikan buku" style="color:white;">Kembalikan</a>
                              <?php } else { ?>
                                 <a href="#" class='btn btn-danger' style="color:white;" title="Klik untuk mengembalikan buku">Proses Acc Admin</a>
                              <?php } ?>
                           </div>
                           <span style="font-size: 12px;">Tanggal Kembali : <?php echo date('d M Y', strtotime($dp['tgl_kembali_pinjaman'])); ?></span><br>
                           <a href="#" title="Klik untuk mulai membaca"><?php echo $dp['judul_buku']; ?> (<?php echo ucwords($dp['type_buku']); ?>)</a> <br>
                           <p><?php echo $dp['kategori_buku']; ?> karya <?php echo $dp['penulis_buku']; ?><br>
                              <?php if ($dp['tgl_kembali_pinjaman'] < date('Y-m-d')) {
                                 $tanggalawal = strtotime($dp['tgl_kembali_pinjaman']);
                                 $tanggalakhir = strtotime(date('Y-m-d'));
                                 $dendaperhari = 1000;
                                 $harinya = ($tanggalakhir - $tanggalawal) / 86400;
                                 $denda = $harinya * $dendaperhari;
                              ?>
                                 <!-- <a href="<?php echo base_url(); ?>admin/kembalikan/<?php echo $dp['id_buku_pinjaman']; ?>/<?php echo $dp['jumlah_buku']; ?>/<?php echo $dp['id_user']; ?>" class="btn btn-danger btn-sm" title="Klik untuk mengembalikan buku"><i class="fa fa-refresh"></i></a> -->
                                 <span class="label label-danger">Melewati <?= $harinya ?> hari, Denda sebesar : Rp <?= $denda ?></span>
                              <?php } else { ?>
                                 <span class="label label-primary">Belum Kena Denda</span>
                              <?php } ?>
                           </p>
                        </div>
                     <?php } ?>
                  <?php endforeach;
               } else { ?>
                  <h3 style="text-align:center;">Anda tidak mempunyai pinjaman buku.</h3>
               <?php } ?>
            </div>
         </div>
      </div>

   </div>

</section>
<!-- /.content -->