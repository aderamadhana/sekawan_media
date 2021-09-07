<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    
    <a href="<?= site_url('Pemesanan/admin')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Konfirmasi Pemesanan</h5>
        <div class="card-body">
            <form action="<?= site_url('Pemesanan/doKonfirmasiPemesanan') ?>" method="post">
                <?php foreach($pemesanan as $data){ ?>
                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $data->id_pemesanan?>" readonly>
                    <input type="hidden" class="form-control" name="status_konfirmasi_admin" value="1">
                    <input type="text" class="form-control" value="<?= $data->nama_kendaraan?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Pemesan</label>
                    <input type="text" class="form-control" value="<?= $data->nama_lengkap?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Driver</label>
                    <select class="form-control" name="id_driver" required>
                        <option value="">-- Pilih Driver --</option>
                        <?php foreach($driver as $row) {?>
                        <option value="<?= $row->id_driver?>"><?= $row->nama_driver?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pihak Persetujuan Pertama</label>
                    <select class="form-control" name="id_pihak_pertama" required>
                        <option value="">-- Pilih Pihak Pertama --</option>
                        <?php foreach($user_persetujuan as $row) {?>
                        <option value="<?= $row->id_user?>"><?= $row->nama_lengkap?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pihak Persetujuan Kedua</label>
                    <select class="form-control" name="id_pihak_kedua" required>
                        <option value="">-- Pilih Pihak Kedua --</option>
                        <?php foreach($user_persetujuan as $row) {?>
                        <option value="<?= $row->id_user?>"><?= $row->nama_lengkap?></option>
                        <?php }?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                <?php }?>
            </form>
        </div>
    </div>
</div>