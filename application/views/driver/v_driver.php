<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    
    <a href="<?php echo site_url('Driver/add')?>" class="btn btn-primary btn-add">Tambah Data</a>
    
    <div class="card">
        <h5 class="card-header">Tabel Driver</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Driver</th>
                        <th scope="col">Alamat Driver</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($driver as $data){ 
                    ?>
                    <tr>
                        <th scope="row"><?= $no++?></th>
                        <td><?= $data->nama_driver?></td>
                        <td><?= $data->alamat_driver?></td>
                        <td>
                            <a href="<?php echo site_url('Driver/edit/').$data->id_driver?>" class="btn btn-warning" title="Edit Driver"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="<?php echo site_url('Driver/delete/').$data->id_driver?>" class="btn btn-danger" title="Hapus Driver" onclick="return confirm('Apakah anda yakin untuk menghapus data Driver ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>