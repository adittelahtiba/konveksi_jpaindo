        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
            <div class="col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a  data-toggle="modal" data-target="#newMenuModal"><h6 class="m-0 font-weight-bold text-primary tampilmodaltambah">Tambah Design</h6></a>
              <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Kode</th>
                      <th>Ukuran</th>
                      <th>Kode Desain</th>
                      <th>Kode Bahan Baku</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i =1; foreach ($Bahanbakudesain as $d) : ?>
                      <tr align="center">
                        <td><?= $i++; ?></td>
                        <td><?= $d['KodeBBakuDesain']; ?></td>
                        <td><?= $d['UkuranBBDM2']; ?></td>
                        <td><?= $d['KdDesain']; ?></td>
                        <td><?= $d['KdBBaku']; ?></td>
                        <td>
                          <a href ="#" data-toggle="modal" data-target="#newMenuModal" class="badge badge-success tampilmodalubah" data-id="<?= $d['KodeBBakuDesain']; ?>" >Edit</a>
                           | 
                         <a href ="#" class="badge badge-danger btnhapus" id="btnhapus" data-id="<?= $d['KodeBBakuDesain']; ?>">Hapus</a>
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
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Desain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('Design', ['id' => 'frmid']);?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="KodeBBakuDesain" class="col-sm-2 col-form-label" id="lblKodeBBakuDesain">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="KodeBBakuDesain" readonly name="KodeBBakuDesain">
            </div>
          </div>
          <div class="form-group row">
            <label for="UkuranBBDM2" class="col-sm-2 col-form-label">Ukuran</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="UkuranBBDM2" name="UkuranBBDM2">
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
          <div class="form-group row">
            <label for="KdBBaku" class="col-sm-2 col-form-label" id="lblKdPola">Kode Bahan Baku</label>
            <div class="col-sm-10">
              <select name="KdBBaku" id="KdBBaku" class="form-control" name="KdBBaku">
                <option value="">Select Menu</option>
                <?php foreach ($bahanbaku as $bk) :?>
                  <option value="<?= $bk['KdBBaku'] ?>"><?= $bk['KdBBaku']; ?></option>
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
