<!-- FOOTER -->
                <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 widget-footer">
                            <h5>Tentang</h5>
                            <img src="<?= base_url('assets/front/'); ?>images/basic/logo-lite.png" class="img-responsive space10" alt=""/>
                            <p>
                                 Akbarindo Konveksi adalah sebuah konveksi yang beralamat di Kp. Kaca-Kaca Dua RT/RW 01/03 , Ds. Pasirmulya , Kec. Banjaran Kab. Bandung, Jawa Barat.
                            </p>
                            <div class="clearfix"></div>
                            <ul class="f-social">
                                <li>
                                    <a href="#" class="fa fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fa fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fa fa-rss"></a>
                                </li>
                                <li>
                                    <a href="#" class="fa fa-envelope"></a>
                                </li>
                                <li>
                                    <a href="#" class="fa fa-pinterest"></a>
                                </li>
                                <li>
                                    <a href="#" class="fa fa-instagram"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-3 widget-footer">
                            <h5>Tweets Terakhir</h5>
                            <div class="tweet-info">
                                <div id="twitterfeed"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 widget-footer">
                            <h5>Produk tags</h5>
                            <ul class="widget-tags">
                                <li>
                                    <a href="./categories-grid.html">fashion</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">sports</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">business</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">news</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">night</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">freedom</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">design</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">miracle</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">gallery</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">collection</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">pen</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">pants</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">jeans</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">photos</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">oscar</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">smile</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">love</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">sunshine</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">luxury</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">forever</a>
                                </li>
                                <li>
                                    <a href="./categories-grid.html">inlove</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-3 widget-footer">
                            <h5>Promo & Info</h5>
                            <p>
                                 Daftar dan dapatkan info dan promo menarik
                            </p>
                            <form class="newsletter">
                                <input type="text" placeholder="namaemail@email.com">
                                <button type="submit">Berlangganan !</button>
                            </form>
                        </div>
                    </div>
                </div>
                </footer>
                <!-- FOOTER COPYRIGHT -->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <br>
                                <p>
                                     Copyright 2015 &middot; Designed & Developed by <a href="#">jThemes Studio.</a> All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir FOOTER COPYRIGHT --></div>
            <div id="backtotop">
                <i class="fa fa-chevron-up"></i>
            </div>
            <!-- Javascript -->
            <script src="<?= base_url('assets/front/'); ?>js/jquery.js"></script>
            <!-- ADDTHIS -->
            <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-557a95e76b3e51d9" async="async"></script>
            <script type="text/javascript">
                                            // Call this function once the rest of the document is loaded
                                            function loadAddThis() {
                                                addthis.init()
                                            }
            const flashdata = $('.flash-data').data('flash');
            if (flashdata) {
                Swal.fire({
                title: 'Berhasil',
                text:  flashdata,
                type: 'success'
                });
            }
        </script>
            <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
                
            <script src="<?= base_url('assets/front/'); ?>js/bootstrap.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>plugin/owl-carousel/owl.carousel.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/bs-navbar.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/vendors/isotope/isotope.pkgd.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/vendors/slick/slick.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/vendors/tweets/tweecool.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/vendors/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/jquery.sticky.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/jquery.subscribe-better.js"></script>
            <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/vendors/select/jquery.selectBoxIt.min.js"></script>
            <script src="<?= base_url('assets/front/'); ?>js/main.js"></script>

            <?php if ($title == 'pesan'): ?>
                <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>    
            <?php endif ?>
            
            <script src="<?= base_url('assets/'); ?>js/adit.js"></script>
            <script src="<?= base_url('assets/'); ?>js/adit.1.js"></script>
            
            

            </body>
            </html>