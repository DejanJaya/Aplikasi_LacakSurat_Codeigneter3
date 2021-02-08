<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_surat"><i class="fas fa-plus fa-sm"></i> Tambah Data Surat </button>
    <a href="<?php echo base_url() . '/admin/Data_surat/printPdf' ?>" type="button" class="btn btn-light" style="float: right;">
        <img src="<?php echo base_url() . 'assets/img/pdf.png' ?>" width="40px"></br>
    </a>
    <?= $this->session->flashdata('message'); ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr class="text-center">
                <th>NO</th>
                <th>NO_AWB</th>
                <th>CONSIGNEE</th>
                <th>TANGGAL</th>
                <th>ALAMAT</th>
                <th>NAME</th>
                <th>STATUS</th>
                <th colspan="3">AKSI</th>
            </tr>

            <?php
            $no = 1;
            foreach ($surat as $sr) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $sr->no_awb ?></td>
                    <td><?php echo $sr->consignee ?></td>
                    <td><?php echo $sr->tgl ?></td>
                    <td><?php echo $sr->alamat ?></td>
                    <td><?php echo $sr->name ?></td>
                    <td><?php echo $sr->status ?></td>

                    <!-- tombol button -->
                    <td> <?php echo anchor('admin/Data_surat/detail_surat/' . $sr->id_surat, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/Data_surat/edit_surat/' . $sr->id_surat, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                    <td> <?php echo anchor('admin/Data_surat/hapus_surat/' . $sr->id_surat, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
</div>

<!-- link button tambah -->
<!-- Modal -->
<div class="modal fade" id="tambah_surat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/Data_surat/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>No AWB </label>
                        <input type="text" name="no_awb" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Consignee</label>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $sr->id ?>">
                        <input type="text" name="consignee" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control" value="<?php date("Y-m-d") ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kurir</label>
                        <select class="form-control" name="id_kurir" id="id_kurir">
                            <option value="">---pilih kurir---</option>
                            <?php foreach ($user as $row) : ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="On Progress">
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>