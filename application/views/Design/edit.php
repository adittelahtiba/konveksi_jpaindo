        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
          		<?php echo $this->session->flashdata('message'); ?>
          		<?= form_open_multipart('Design/Edit/' . $design['KdDesain']);?>
          			<div class="form-group row">
						<label for="KdDesain" class="col-sm-2 col-form-label">Kode Desain</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="KdDesain" name="KdDesain" readonly value="<?= $design['KdDesain']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label for="KdDesain" class="col-sm-2 col-form-label">Kode Desain</label>
						<select name="KdPola" class="form-control" name="KdPola">
			              <option value="">Select Menu</option>
			              <?php foreach ($pola as $p) :?>
			                <option <?= $p['KdPola'] == $design['KdPola'] ? 'selected' : '' ?> value="<?= $p['KdPola'] ?>"><?= $p['KdPola']; ?></option>
			              <?php endforeach; ?>
			            </select>
						<?php echo form_error('NamaBBaku', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					
					<div class="form-group row">
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-3">
									<img src="<?= base_url('assets/img/design/'). $design['GbrDesain']; ?>" class="img-thumbnail">
								</div>
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="GbrDesain" name="GbrDesain">
										<label class="custom-file-label" for="GbrDesain">Masukan Gambar</label>
									</div>
								</div>
							</div>
						</div>
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