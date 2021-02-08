<div class="container-fluid">
    <h5>Edit Data Surat</h5>

    <?php foreach ($surat as $sr) : ?>
        <form method="post" action="<?php echo base_url() . 'admin/Data_surat/update' ?>" enctype="multipart/form-data">

            <div class="form-group">
                <input type="text" hidden name="id_surat" class="form-control" value="<?php echo $sr->id_surat ?>">
            </div>
            <div class="form-group">
                <label>NO AWB</label>
                <input type="text" name="no_awb" class="form-control" value="<?php echo $sr->no_awb ?>" readonly>
            </div>

            <div class="form-group">
                <label>Consignee</label>
                <input type="hidden" name="id_customer" class="form-control" value="<?php echo $sr->id_surat ?>">
                <input type="text" name="consignee" class="form-control" value="<?php echo $sr->consignee ?>">
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="datetime" name="tgl" class="form-control" value="<?php echo $sr->tgl   ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $sr->alamat ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Kurir</label>
                <select class="form-control" name="id_kurir" id="id_kurir">
                    <option value="">---pilih kurir---</option>
                    <?php foreach ($user as $row) : ?>
                        <?php if ($row->id == $sr->id_kurir) { ?>
                            <option selected value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option><?php } else { ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php   } ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Status</label>
                <select class="form-control" name="status" id="status" value="<?= $sr->status; ?>">
                    <option value="<?= $sr->status; ?>"><?= $sr->status; ?></option>
                    <?php if ($sr->status == 'On Progress') { ?>
                        <option value="Complete">Complete</option>
                    <?php  } else { ?>
                        <option value="On Progress">On Progress</option>
                    <?php  } ?>
                </select>
                <?= form_error('jkel', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
            <?php echo anchor('admin/data_surat/index', '<div class="btn btn-primary btn-sm mt-3">Kembali</div>') ?>

        </form>
    <?php endforeach; ?>
</div>