<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
            </div>
            <form class="user" action="<?= base_url('auth/daftar'); ?>" method="post">
              <div class="form-group">
                <input type="text" name="id" class="form-control form-control-user" id="exampleInputEmail" placeholder="NIP" value="<?= set_value('id'); ?>">
                <?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama" value="<?= set_value('name'); ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" name="phone" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nomor Telepon" value="<?= set_value('phone'); ?>">
                <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password">

                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Daftar
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/masuk'); ?>">Sudah punya akun? masuk!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>