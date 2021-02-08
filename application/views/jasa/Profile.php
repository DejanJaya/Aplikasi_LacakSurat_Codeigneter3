<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="col-md-8">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_user['username']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['nama']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tempat</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['tempat_lahir']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['tgl_lahir']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly><?= $tb_kurir['alamat']; ?> </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telp</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['no_telp']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Agama</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['agama']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $tb_kurir['jkel']; ?>" readonly>
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content