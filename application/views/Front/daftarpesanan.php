<!-- DESAIN PAKAIAN -->
<div class="shop-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="row">
          <div class="col-md-7 col-sm-6">
            <div class="product-single">
              <div class="sub2 text-left">
                <h5>Daftar Pesanan</h5>
              </div>
              <div class="space50"></div>
              <div class="row select-wraps">
                <div class="table-responsive">            
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Pesanan</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">ID Pemesan</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($get_allpesanan as $gap) { ?>
                        <tr>
                          <th scope="row"><?= $i++; ?></th>
                          <td><?= $gap['IdPesanan']; ?></td>
                          <td><?= $gap['TglPesan']; ?></td>
                          <td><?= $gap['IdPemesan']; ?></td>
                          <td><?= $gap['Nama']; ?></td>
                          <td>
                            <a href="<?= base_url('Front/detail/') .$gap['IdPesanan']; ?>" type="button" class="btn btn-black">Detail</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-6">                                    
            <div class="sync1">
              <div class="item"> 
                <img src="<?= base_url('assets/front') ?>/images/undraw_empty_cart_co35.png">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix space80"></div>
</div>
</div>
</div>
</div>
<div class="clearfix space20"></div>