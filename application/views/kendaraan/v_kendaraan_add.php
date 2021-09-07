<div class="col-md-12 content">
    
    <a href="<?= site_url('Kendaraan')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Tambah Kendaraan</h5>
        <div class="card-body">
            <form action="<?= site_url('Kendaraan/doAdd') ?>" method="post">
                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="text" class="form-control" name="nama_kendaraan">
                </div>
                <div class="form-group">
                    <label>Nomor Plat</label>
                    <input type="text" class="form-control" name="nomor_plat">
                </div>
                <div class="form-group">
                    <label>Status Kendaraan</label>
                    <select class="form-control" name="status_kendaraan">
                        <option value="">-- Pilih Status Kendaraan --</option>
                        <option value="0">Kendaraan Tidak Tersedia</option>
                        <option value="1">Kendaraan Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Servis</label>
                    <select class="form-control" name="status_servis">
                        <option value="">-- Pilih Status Servis --</option>
                        <option value="1">Harus Servis</option>
                        <option value="0">Belum Waktunya Servis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jadwal Servis</label>
                    <input type="date" class="form-control" name="jadwal_servis">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>