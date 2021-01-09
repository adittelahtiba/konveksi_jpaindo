        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
          		<?php echo $this->session->flashdata('message'); ?>
          		<form action="<?= base_url('Bahanbaku/add'); ?>" method="post">
					<div class="form-group">
						<label for="NamaBBaku">Nama Bahan Baku</label>
						<input type="text" class="form-control" id="NamaBBaku" name="NamaBBaku">
						<?php echo form_error('NamaBBaku', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="jenis">Jenis</label>
						<input type="text" class="form-control" id="jenis" name="jenis">
						<?php echo form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label for="warna">Warna</label>
						<input type="text" class="form-control" id="warna" name="warna">
						<?php echo form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="HargaPerM2">Harga/M2</label>
						<input type="number" class="form-control" id="HargaPerM2" name="HargaPerM2">
						<?php echo form_error('HargaPerM2', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="TersediaM2">Tersedia/M2</label>
						<input type="number" class="form-control" id="TersediaM2" name="TersediaM2">
						<?php echo form_error('TersediaM2', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success">Tambah</button>
						<button type="submit" class="btn btn-primary">Batal</button>
					</div>
          		</form>
          	</div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->