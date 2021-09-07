<div class="col-md-12 content">
    
    <a href="<?= site_url('Pemesanan/pegawai')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Tambah Pemakaian</h5>
        <div class="card-body">
            <form action="<?= site_url('Pemesanan/doAddPemakaian') ?>" method="post">
            <?php foreach($pemesanan as $data){ ?>
                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="text" class="form-control" value="<?= $data->nama_kendaraan?>" readonly>
                    <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $data->id_pemesanan?>">
                </div>
                <div class="form-group">
                    <label>Konsumsi BBM (liter)</label>
                    <input type="number" class="form-control" name="konsumsi_bbm" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Pemakaian</label>
                    <input type="date" class="form-control" name="tanggal_pemakaian" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            <?php }?>
            </form>
        </div>
    </div>
</div>