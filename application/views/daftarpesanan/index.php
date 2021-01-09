<center>
  <h4>Daftar Pesanan</h4>
  <hr>
</center>

<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Id Pesanan</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Tanggal Pesan</th>
      <th scope="col">Pemesan</th>
    </tr>
  </thead>

  <?php
  $i = 0;
  foreach ($dpsnn as $dps) {
    $i++;
    ?>


    <tbody>
      <tr>
        <th scope="row"><?= $i; ?></th>
        <td><?= $dps['IdPesanan']; ?></td>
        <td><?= $dps['Deskripsi']; ?></td>
        <td><?= $dps['TGL']; ?></td>
        <td><?= $dps['Nama']; ?></td>
        <td><a href="<?= base_url('daftarpesanan/detail'); ?>/<?= $dps['IdPesanan']; ?>">detail</a></td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            detail
          </button>
        <?php } ?>

</table>