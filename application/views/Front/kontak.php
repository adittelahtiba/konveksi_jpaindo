<!-- BREADCRUMBS -->
<div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="<?= base_url('Front/kontak') ?>">Kontak</a></li>

        </ul>
    </div>
</div>

<div class="space20"></div>

<!-- BLOG CONTENT -->
<div class="blog-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-sm-4">
                <div class="contact-info space50">
                    <h5 class="heading space40"><span>Hbungi Kami</span></h5>
                    <div class="media-list">
                        <div class="media">
                            <i class="pull-left fa fa-home"></i>
                            <div class="media-body">
                                <strong>Alamat:</strong><br>
                                Kp. Kaca-Kaca Dua RT/RW 01/03 , Ds. Pasirmulya , Kec. Banjaran Kab. Bandung, Jawa Barat.
                            </div>
                        </div>
                        <div class="media">
                            <i class="pull-left fa fa-phone"></i>
                            <div class="media-body">
                                <strong>Telepon:</strong><br>
                                (012) 345-7689
                            </div>
                        </div>
                        <div class="media">
                            <i class="pull-left fa fa-envelope-o"></i>
                            <div class="media-body">
                                <strong>Email:</strong><br>
                                akbarindo@konveksi.com
                            </div>
                        </div>

                    </div>

                </div>
            </aside>
            <aside class="col-sm-8">
                <div class="google-map space50">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d806.8278334065084!2d107.58240512915367!3d-7.08125569968037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68eb5baaebc83d%3A0x9d472526fdeebc79!2sBoemi+Alit+Rorompokarya!5e1!3m2!1sen!2sid!4v1561460702414!5m2!1sen!2sid" width="750" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>


                </div>
            </aside>

            <div class="clearfix"></div>
            <div class="col-md-12">
                <h5 class="heading"><span>Form Kontak</span></h5>
                <form method="post" action="<?= base_url('backup/kontak'); ?>">
                    <div class="row">
                        <div class="col-md-6 space20">
                            <input name="name" id="name" class="input-md form-control" placeholder="Nama *" maxlength="100" required="" type="text">
                        </div>
                        <div class="col-md-6 space20">
                            <input name="email" id="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email">
                        </div>
                    </div>
                    <div class="space20">
                        <input class="input-md form-control" placeholder="Subjek" maxlength="100" required="" type="text">
                    </div>
                    <div class="space20">
                        <textarea name="text" id="text" class="input-md form-control" rows="6" placeholder="Pesan" maxlength="400"></textarea>
                    </div>
                    <button type="submit" class="btn-black">
                        Kirim Pesan
                    </button>
                </form>
                <div class="space60"></div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix space20"></div>