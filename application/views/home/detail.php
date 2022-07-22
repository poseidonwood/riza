<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?= base_url(); ?>assets/buku/<?= $bukuid['foto_buku']; ?>" alt="#"></div>
  <h1><?= $title; ?> <?= $bukuid['kategori_buku']; ?> <?= $bukuid['judul_buku']; ?></h1>
  <ul>
    <li><a href="<?= base_url(); ?>home">Home</a></li>
    <li><a href=""><?= $bukuid['kategori_buku']; ?></a></li>
    <li><a href="#"><?= $bukuid['judul_buku']; ?></a></li>
  </ul>
</div>
<div class="container">
  <div class="row">
    <div class="content col-sm-12">
      <div class="row">
        <div class="col-sm-5">
          <div class="thumbnails">
            <?php
            if ($bukuid['type_buku'] == 'digital') {
              echo "<div class='ribbon blue'><span>Digital</span></div>";
            } else {
              echo "<div class='ribbon green'><span>Fisik</span></div>";
            }
            ?>
            <div><a class="thumbnail fancybox" href="image/product/product8.jpg" title="<?= $bukuid['judul_buku']; ?>">
            <img style="width:100%;" src="<?= base_url(); ?>assets/buku/<?= $bukuid['foto_buku']; ?>" title="<?= $bukuid['judul_buku']; ?>" alt="<?= $bukuid['judul_buku']; ?>" /></a></div>

          </div>
        </div>
        <div class="col-sm-7 prodetail">
          <h1 class="productpage-title"><?= $bukuid['judul_buku']; ?></h1>
          <?php if ($this->session->userdata('status_login') != 'sudah_login') { ?>
            <!-- <div class="rating"> Beri Bintang Untuk Buku Ini
              <?= "<div id='rate-$bukuid[id_buku]'>
        <input type='hidden' name='rating' id='rating' value='$bukuid[jml_bintang]'>
          <ul onMouseOut=\"resetRating($bukuid[id_buku])\">";
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $bukuid["jml_bintang"]) {
                  $selected = "selected";
                } else {
                  $selected = "";
                }
                echo "<li class='$selected' onmouseover=\"highlightStar(this,$bukuid[id_buku])\" onmouseout=\"removeHighlight($bukuid[id_buku]);\" onClick=\"noRating()\">&#9733;</li>";
              }
              echo "<ul>
        </div>"; ?>
            </div> -->
          <?php } else { ?>
            <!-- <div class="rating"> Beri Bintang Untuk Buku Ini
              <?= "<div id='rate-$bukuid[id_buku]'>
        <input type='hidden' name='rating' id='rating' value='$bukuid[jml_bintang]'>
          <ul onMouseOut=\"resetRating($bukuid[id_buku])\">";
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $bukuid["jml_bintang"]) {
                  $selected = "selected";
                } else {
                  $selected = "";
                }
                echo "<li class='$selected' onmouseover=\"highlightStar(this,$bukuid[id_buku])\" onmouseout=\"removeHighlight($bukuid[id_buku]);\" onClick=\"addRating(this,$bukuid[id_buku])\">&#9733;</li>";
              }
              echo "<ul>
        </div>"; ?>
            </div> -->
          <?php } ?>
          <hr>
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <h2 class="productpage-price">Info :</h2>
            </li>
          </ul>
          <ul class="list-unstyled product_info">
            <li style="color:black;">
              <label>Penulis:</label>
              <span> <a href="#"><?= $bukuid['penulis_buku']; ?></a></span>
            </li><br>
            <li style="color:black;">
              <label>Kategori:</label>
              <span> <?= $bukuid['kategori_buku']; ?></span>
            </li><br>
            <li style="color:black;">
              <label>Jumlah Halaman:</label>
              <span> <?= $bukuid['jml_halaman']; ?> Halaman</span>
            </li><br>
            <li style="color:black;">
              <label>Status Ketersediaan:</label>
              <span>
                <?php if ($bukuid['jumlah_buku'] != 0) { ?>
                  Tersedia <?= $bukuid['jumlah_buku']; ?> Item lagi
                <?php } else { ?>
                  Kosong
                <?php } ?>
              </span>
            </li>
          </ul>
          <hr>
          <p class="product-desc" style="color:black;"> <?= $bukuid['deskripsi_buku']; ?></p>
          <div id="product">
            <div class="form-group">
              <?php
              if ($bukuid['type_buku'] == 'digital') {
              ?>
                <?php if ($bukuid['jumlah_buku'] == 0) { ?>
                  <a class="btn btn-success" onclick="nol();"> Baca</a>
                <?php } else { ?>
                  <a href="<?= base_url(); ?>user/baca/detail/<?= $bukuid['url_buku']; ?>" class="btn btn-info addtocart-btn" title="Baca"> Baca </a>
                <?php }
              } else {
                ?>
                <?php if ($bukuid['jumlah_buku'] == 0) { ?>
                  <a class="btn btn-primary" onclick="nol();"> Pinjam</a>
                <?php } else { ?>
                  <a href="<?= base_url(); ?>home/pinjam/<?= $bukuid['id_buku']; ?>" class="btn btn-primary"> Pinjam</a>
              <?php }
              } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="productinfo-tab">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-description">
            <div class="cpt_product_description ">
              <div>
                <p> <?= $bukuid['deskripsi_buku']; ?></p>
              </div>
            </div>
            <!-- cpt_container_end -->
          </div>
          <div class="tab-pane" id="tab-review">
            <form class="form-horizontal">
              <div id="review"></div>
              <h2>Write a review</h2>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-name">Your Name</label>
                  <input type="text" name="name" value="" id="input-name" class="form-control" />
                </div>
              </div>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label" for="input-review">Your Review</label>
                  <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                  <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                </div>
              </div>
              <div class="form-group required">
                <div class="col-sm-12">
                  <label class="control-label">Rating</label>
                  &nbsp;&nbsp;&nbsp; Bad&nbsp;
                  <input type="radio" name="rating" value="1" />
                  &nbsp;
                  <input type="radio" name="rating" value="2" />
                  &nbsp;
                  <input type="radio" name="rating" value="3" />
                  &nbsp;
                  <input type="radio" name="rating" value="4" />
                  &nbsp;
                  <input type="radio" name="rating" value="5" />
                  &nbsp;Good
                </div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<<!-- div class="container">
  <h3 class="h3"><?= $title; ?> <?= $bukuid['kategori_buku']; ?> <?= $bukuid['judul_buku']; ?></h3>
  <div class="embed-responsive embed-responsive-1by1">
    <iframe class="embed-responsive-item" src="<?= $bukuid['link_buku']; ?>" allowfullscreen></iframe>
  </div>
  </div>
  <hr>
  -->