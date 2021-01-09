        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
            <div class="col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a  data-toggle="modal" data-target="#newMenuModal"><h6 class="m-0 font-weight-bold text-primary tampilmodaltambah">Tambah Barang</h6></a>
              <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama</th>
                      <th>Ukuran</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; foreach ($barang as $d) : ?>
                      <tr align="center">
                        <td><?= $i++; ?></td>
                        <td><?= $d['KdBarang']; ?></td>
                        <td><?= $d['NamaBrg']; ?></td>
                        <td><?= $d['Ukuran']; ?></td>
                        <td><?= $d['Harga']; ?></td>
                        <td>
                          <a href ="#" data-toggle="modal" data-target="#newMenuModal" class="badge badge-success tampilmodalubah" data-id="<?= $d['KdBarang']; ?>" >Edit</a>
                           | 
                         <a href ="#" class="badge badge-danger btnhapus" id="btnhapus" data-id="<?= $d['KdBarang']; ?>">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('Design', ['id' => 'frmid']);?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="KdBarang" class="col-sm-2 col-form-label" id="lblKdBarang">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="KdBarang" readonly name="KdBarang">
            </div>
          </div>
          <div class="form-group row">
            <label for="NamaBrg" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NamaBrg" name="NamaBrg">
            </div>
          </div>
          <div class="form-group row">
            <label for="Ukuran" class="col-sm-2 col-form-label">Ukuran</label>
            <div class="col-sm-10">
              <select class="form-control" id="Ukuran" name="Ukuran">
                <option value="">Pilih Ukuran</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="Harga" name="Harga">
            </div>
          </div>
          <div class="form-group row">
            <label for="KdDesain" class="col-sm-2 col-form-label">Kode Desain</label>
            <div class="col-sm-10">
              <select name="KdDesain" id="KdDesain" class="form-control" name="KdDesain">
                <option value="">Select Menu</option>
                <?php foreach ($desain as $d) :?>
                  <option value="<?= $d['KdDesain'] ?>"><?= $d['KdDesain']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success kirim">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
