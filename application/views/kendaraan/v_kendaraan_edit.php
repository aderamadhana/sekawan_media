<div class="col-md-12 content">
    
    <a href="<?= site_url('Kendaraan')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Edit Kendaraan</h5>
        <div class="card-body">
            <form action="<?= site_url('Kendaraan/doEdit') ?>" method="post">
                <?php 
                    foreach($kendaraan as $data){
                ?>
                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="hidden" class="form-control" name="id_kendaraan" value="<?= $data->id_kendaraan?>">
                    <input type="text" class="form-control" name="nama_kendaraan" value="<?= $data->nama_kendaraan?>">
                </div>
                <div class="form-group">
                    <label>Nomor Plat</label>
                    <input type="text" class="form-control" name="nomor_plat" value="<?= $data->nomor_plat?>">
                </div>
                <div class="form-group">
                    <label>Status Kendaraan</label>
                    <select class="form-control" name="status_kendaraan">
                        <option value="">-- Pilih Status Kendaraan --</option>
                        <option value="0" <?php if($data->status_kendaraan == 0) echo 'selected'?>>Kendaraan Tidak Tersedia</option>
                        <option value="1" <?php if($data->status_kendaraan == 1) echo 'selected'?>>Kendaraan Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Servis</label>
                    <select class="form-control" name="status_servis">
                        <option value="">-- Pilih Status Servis --</option>
                        <option value="1" <?php if($data->status_servis == 1) echo 'selected'?>>Harus Servis</option>
                        <option value="0" <?php if($data->status_servis == 0) echo 'selected'?>>Belum Waktunya Servis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jadwal Servis</label>
                    <input type="date" class="form-control" value="<?= $data->jadwal_servis?>" name="jadwal_servis">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php }?>
            </form>
        </div>
    </div>
</div>