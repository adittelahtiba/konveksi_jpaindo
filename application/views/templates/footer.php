<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; MPPL sistem informasi Konveksi <?= date('Y'); ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>




<!-- Bootstrap core JavaScript-->

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/adit.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<?php if ($title == 'Jenis Pakaian') { ?>
  <script src="<?= base_url('assets/'); ?>js/Jenispakaian.js"></script>
<?php } ?>
<?php if ($title == 'Design') { ?>
  <script src="<?= base_url('assets/'); ?>js/script.js"></script>
<?php } ?>
<?php if ($title == 'Bahan Baku Desain') { ?>
  <script src="<?= base_url('assets/'); ?>js/Bahanbakudesain.js"></script>
<?php } ?>
<?php if ($title == 'Pola') { ?>
  <script src="<?= base_url('assets/'); ?>js/Pola.js"></script>
<?php } ?>
<?php if ($title == 'Barang') { ?>
  <script src="<?= base_url('assets/'); ?>js/Barang.js"></script>
<?php } ?>
<?php if ($title == 'Bahan Baku') { ?>
  <script src="<?= base_url('assets/'); ?>js/Bahanbaku.js"></script>
<?php } ?>
<?php if ($title == 'Pegawai') { ?>
  <script src="<?= base_url('assets/'); ?>js/Pegawai.js"></script>
<?php } ?>


<script type="text/javascript">
  $('#GbrDesain').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
  });
</script>

</body>

</html>