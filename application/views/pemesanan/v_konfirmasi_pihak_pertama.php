<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    
    <a href="<?= site_url('Pemesanan/pihak_setuju')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Konfirmasi Pemesanan</h5>
        <div class="card-body">
            <form action="<?= site_url('Pemesanan/doKonfirmasiPemesananPihakPertama') ?>" method="post">
                <?php foreach($pemesanan as $data){ ?>
                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $data->id_pemesanan?>" readonly>
                    <input type="hidden" class="form-control" name="status_konfirmasi_pihak_pertama" value="1">
                    <input type="text" class="form-control" value="<?= $data->nama_kendaraan?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Pemesan</label>
                    <input type="text" class="form-control" value="<?= $data->nama_lengkap?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Driver</label>
                    <input type="text" class="form-control" value="<?= $data->nama_driver?>" readonly>
                </div>
                
                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                <?php }?>
            </form>
        </div>
    </div>
</div>