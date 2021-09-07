<div class="col-md-12 content">
    
    <a href="<?= site_url('Driver')?>" class="btn btn-primary btn-add"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
    
    <div class="card">
        <h5 class="card-header">Edit Driver</h5>
        <div class="card-body">
            <form action="<?= site_url('Driver/doEdit') ?>" method="post">
                <?php 
                    foreach($driver as $data){
                ?>
                <div class="form-group">
                    <label>Nama Driver</label>
                    <input type="hidden" class="form-control" name="id_driver" value="<?= $data->id_driver ?>">
                    <input type="text" class="form-control" name="nama_driver" value="<?= $data->nama_driver ?>">
                </div>
                <div class="form-group">
                    <label>Alamat Driver</label>
                    <textarea class="form-control" name="alamat_driver"><?= $data->alamat_driver ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php }?>
            </form>
        </div>
    </div>
</div>