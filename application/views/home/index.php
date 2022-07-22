<div id="center">
  <div class="container">
    <div class="row">
      <div class="content col-sm-12">
        <div class="customtab">
          <h3 class="productblock-title">Daftar Buku</h3>
        </div>
        <br>
        <!-- .... -->
        <!-- tab-furniture-->
        <div class="tab-content" style="height: 180px;">
          <div class="flash-data-error" data-flashdata="<?php echo $this->session->flashdata('error'); ?>"></div>
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
          <div class="row">
            <?php
             if($databuku !== FALSE ){
              foreach ($databuku as $db) : ?>
              <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <?php
                if ($db['type_buku'] == 'digital') {
                  echo "<div class='ribbon blue'><span>Digital</span></div>";
                } else {
                  echo "<div class='ribbon green'><span>Fisik</span></div>";
                }
                ?>
                <div class="item">
                  <div class="product-thumb">
                    <div class="image product-imageblock"> <a href="<?php echo base_url(); ?>home/detail/<?php echo $db['url_buku']; ?>"> <img style="height: 360px; width:100%;" src="<?php echo base_url(); ?>assets/buku/<?php echo $db['foto_buku']; ?>" alt="<?php echo $db['judul_buku']; ?>" title="<?php echo $db['kategori_buku']; ?> <?php echo $db['judul_buku']; ?>" class="img-responsive" /> <img src="<?php echo base_url(); ?>assets/buku/<?php echo $db['foto_buku']; ?>" alt="<?php echo $db['judul_buku']; ?>" title="<?php echo $db['kategori_buku']; ?> <?php echo $db['judul_buku']; ?>" class="img-responsive" /> </a>
                      <!-- <ul class="button-group">
                        <li>
                          <div class="row">
                            <a href="<?php echo base_url(); ?>home/detail/<?php echo $db['url_buku']; ?>" class="addtocart-btn" title="Lihat Detail"> Detail </a>
                          </div>
                        </li>
                      </ul> -->
                    </div>
                    <div class="caption product-detail">
                      <?php if ($db['jml_bintang'] == 0) { ?>
                        <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div> -->
                      <?php } elseif ($db['jml_bintang'] == 1) { ?>
                        <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> </div> -->
                      <?php } elseif ($db['jml_bintang'] == 2) { ?>
                        <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span></div> -->
                      <?php } elseif ($db['jml_bintang'] == 3) { ?>
                        <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span></div> -->
                      <?php } elseif ($db['jml_bintang'] == 4) { ?>
                        <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span></div> -->
                      <?php } else { ?>
                        <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i><i class="fa fa-star fa-stack-2x"></i></span></div> -->
                      <?php } ?>
                      <h4 class="product-name"><a href="<?php echo base_url(); ?>home/detail/<?php echo $db['url_buku']; ?>" title="<?php echo $db['judul_buku']; ?>"><?php echo $db['judul_buku']; ?></a></h4>
                      <div class="row">
                        <?php
                        if ($db['type_buku'] == 'digital') {
                          echo "<div class='col-12'>Dibaca ({$db['jumlah_baca']}) Kali</div>";
                        } else {
                          echo "<div class='col-12'>Stok ({$db['jumlah_buku']}) Pcs</div>";
                        }
                        ?>
                      </div>
                    </div>
                    <table class="table borderless" style="margin-top:10px;">
                      <tbody>
                        <tr>
                          <?php
                          if ($db['type_buku'] == "digital") {
                          ?>
                            <td align="center">
                              <a href="<?php echo base_url(); ?>user/baca/detail/<?php echo $db['url_buku']; ?>" class="btn btn-info addtocart-btn" title="Baca"> Baca </a>
                            </td>
                            <td>&nbsp;</td>
                            <td align="center">
                              <a href="<?php echo base_url(); ?>home/detail/<?php echo $db['url_buku']; ?>" class="btn btn-success addtocart-btn" title="Download"> Detail </a>
                            </td>
                          <?php
                          } else { ?>
                            <td align="center">
                              <?php if ($db['jumlah_buku'] == 0) { ?>
                                <a class="btn btn-primary" onclick="nol();"> Pinjam</a>
                              <?php } else { ?>
                                <a href="<?php echo base_url(); ?>home/pinjam/<?php echo $db['id_buku']; ?>" class="btn btn-primary"> Pinjam</a>
                              <?php } ?>
                            </td>
                            <td>&nbsp;</td>
                            <td align="center">
                              <a href="<?php echo base_url(); ?>home/detail/<?php echo $db['url_buku']; ?>" class="btn btn-success addtocart-btn" title="Download"> Detail </a>
                            </td>
                          <?php }
                          ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php endforeach; 
            }else{
            echo "<h5 style='text-align:center;'>Data yang anda cari tidak ada</h5>";
            }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>