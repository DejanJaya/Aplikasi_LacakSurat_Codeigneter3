<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Surat</h5>
        <div class="card-body">

            <?php foreach ($surat as $sr) : ?>

                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>No AWB</td>
                            <td><strong><?php echo $sr->no_awb ?></strong></td>
                        </tr>

                        <tr>
                            <td>Consignee</td>
                            <td><strong><?php echo $sr->consignee ?></strong></td>
                        </tr>

                        <tr>
                            <td>Tanggal</td>
                            <td><strong><?php echo $sr->tgl ?></strong></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td><strong><?php echo $sr->alamat ?></strong></td>
                        </tr>

                        <tr>
                            <td>Nama Kurir</td>
                            <td><strong><?php echo $sr->id_kurir ?></strong></td>
                        </tr>
                        <tr>
                            <td>Foto Penerima</td>
                            <td><strong><img src="<?= base_url(); ?>uploads/foto_penerima/<?php echo $sr->foto_penerima ?>" alt=""></strong></td>
                        </tr>
                        <tr>
                            <td>Foto Lokasi</td>
                            <td><strong><img src="<?= base_url(); ?>uploads/foto_penerima/<?php echo $sr->foto_lokasi ?>" alt=""></strong></td>
                        </tr>
                        <tr>
                            <td>Foto Gedung</td>
                            <td><strong><img src="<?= base_url(); ?>uploads/foto_penerima/<?php echo $sr->foto_gedung ?>" alt=""></strong></td>
                        </tr>
                        <tr>
                            <td>Foto Share Location</td>
                            <td><strong><img src="<?= base_url(); ?>uploads/foto_penerima/<?php echo $sr->foto_shareloc ?>" alt=""></strong></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td><strong><?php echo $sr->status ?></strong></td>
                        </tr>

                    </table>

                    <?php echo anchor('admin/data_surat/index', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>

                </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
</div>