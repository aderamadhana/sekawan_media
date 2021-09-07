<div class="col-md-12 content">
    
    <a href="<?= site_url('Driver')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Tambah Driver</h5>
        <div class="card-body">
            <form action="<?= site_url('Driver/doAdd') ?>" method="post">
                <div class="form-group">
                    <label>Nama Driver</label>
                    <input type="text" class="form-control" name="nama_driver">
                    <input type="hidden" class="form-control" name="status_driver" value="1">
                </div>
                <div class="form-group">
                    <label>Alamat Driver</label>
                    <textarea class="form-control" name="alamat_driver"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>