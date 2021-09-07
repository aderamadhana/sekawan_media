<div class="col-md-12 content">
    
    <a href="<?= site_url('Pemesanan/pegawai')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Tambah Pemesanan</h5>
        <div class="card-body">
            <form action="<?= site_url('Pemesanan/doAdd') ?>" method="post">
                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <select class="form-control" name="id_kendaraan">
                        <option value="">-- Pilih Kendaraan --</option>
                        <?php foreach($kendaraan as $data) {?>
                        <option value="<?= $data->id_kendaraan?>"><?= $data->nama_kendaraan?></option>
                        <?php }?>
                    </select>
                    <input type="hidden" name="id_driver" value="8">
                    <input type="hidden" name="id_pegawai" value="<?= $this->session->userdata('id_user') ?>">
                    <input type="hidden" name="tanggal_pemesanan" value="<?= date('Y-m-d') ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>