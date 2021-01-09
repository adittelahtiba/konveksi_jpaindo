        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-6">
          		<?= form_open_multipart('Design/add');?>
					<div class="form-group">
						<select name="KdPola" class="form-control" name="KdPola">
			              <option value="">Select Menu</option>
			              <?php foreach ($pola as $p) :?>
			                <option value="<?= $p['KdPola'] ?>"><?= $p['KdPola']; ?></option>
			              <?php endforeach; ?>
			            </select>
						<?php echo form_error('KdPola', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					
					<div class="form-group row">
						<div class="col-sm-10">
							<div class="row">
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="GbrDesain" name="GbrDesain">
										<label class="custom-file-label" for="GbrDesain">Masukan Gambar</label>
									</div>
								</div>
							</div>
						</div>
						<?php echo $this->session->flashdata('message'); ?>
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