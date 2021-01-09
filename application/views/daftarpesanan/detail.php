<div class="container">
    <div class="row">
        <div class="col-6">
            <h3><?= $judul ?></h3>

            <table>
                <tr>
                    <td>Id Pesanan
                    <td>:
                    <td><?= $induk['IdPesanan']; ?>
                </tr>
                <tr>
                    <td>Nama Pemesan
                    <td>:
                    <td><?= $induk['Nama']; ?>
                </tr>
                <tr>
                    <td>Tanggal Pesan
                    <td>:
                    <td><?= $induk['TglPesan']; ?>
                </tr>
                <tr>
                    <td>Deskripsi
                    <td>:
                    <td><?= $induk['Deskripsi']; ?>
                </tr>
                <tr>
                    <td>Status Pesanan
                    <td>:
                    <td><?php
                        if ($induk['StatusPesanan'] == 'T') {
                            echo "Menunggu Konfirmasi";
                        } else {
                            echo "Sudah di Konfirmasi";
                            ?>
                    <tr>
                        <td>Bukti Pembayaran
                        <td>:
                        <td><?php
                            if (!$induk['BuktiPembayaran']) {
                                echo "Belum Mengirim Bukti Pembayaran";
                            } else {
                                echo "Sudah Mengirim Bukti Pembayaran";
                            }
                            ?>
                            <?php echo form_open_multipart('daftarpesanan/buktipembayaran/' . $induk['IdPesanan']); ?>

                            <input type="file" name="bukti" size="20" />

                            <br /><br />

                            <input type="submit" value="upload" />

                            </form>
                    </tr>
                    <tr>
                        <td>Status Pembayaran
                        <td>:
                        <td><?php
                            if ($induk['StatusPembayaran'] == 'T') {
                                echo "Menunggu Konfirmasi";
                            } else {
                                echo "Sudah di Konfirmasi";
                            }
                            ?>
                    </tr>
                <?php
            }
            ?>
            </table>
            <table border="1">
                <tr>

                    <td> Jenis Pakaian
                    <td> Nama Barang
                    <td> Ukuran
                    <td> Harga
                    <td> Jumlah
                    <td> Sub Total
                </tr>
                <?php foreach ($detail as $dps) { ?>
                    <tr>
                        <td><?= $dps['NamaJenis']; ?>
                        <td><?= $dps['NamaBrg']; ?>
                        <td><?= $dps['Ukuran']; ?>
                        <td><?= $dps['Harga']; ?>
                        <td><?= $dps['Jumlah']; ?>
                        <td><?= $dps['SubTotal']; ?>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4"></td>
                    <td>Total Harga:</td>
                    <td><?= $induk['TotalHarga']; ?></td>
            </table>
        </div>
    </div>
</div>