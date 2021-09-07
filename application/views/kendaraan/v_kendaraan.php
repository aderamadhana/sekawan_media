<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    
    <a href="<?php echo site_url('Kendaraan/add')?>" class="btn btn-primary btn-add">Tambah Data</a>
    
    <div class="card">
        <h5 class="card-header">Tabel Kendaraan</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">No Plat</th>
                        <th scope="col">Status Kendaraan</th>
                        <th scope="col">Status Servis</th>
                        <th scope="col">Jadwal Servis</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($kendaraan as $data){ 
                            if($data->status_kendaraan == 0){
                                $status_kendaraan = '<span class="badge badge-warning">Kendaraan Tidak Tersedia</span>';
                            }else{
                                $status_kendaraan = '<span class="badge badge-success">Kendaraan Tersedia</span>';
                            }

                            if($data->status_servis == 0){
                                $status_servis = '<span class="badge badge-success">Belum Waktunya Servis</span>';
                            }else{
                                $status_servis = '<span class="badge badge-warning">Harus Servis</span>';
                            }
                                
                    ?>
                    <tr>
                        <th scope="row"><?= $no++?></th>
                        <td><?= $data->nama_kendaraan?></td>
                        <td><?= $data->nomor_plat?></td>
                        <td><?= $status_kendaraan?></td>
                        <td><?= $status_servis?></td>
                        <td><?= $data->jadwal_servis?></td>
                        <td>
                            <a href="<?php echo site_url('Kendaraan/edit/').$data->id_kendaraan?>" class="btn btn-warning" title="Edit Kendaraan"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="<?php echo site_url('Kendaraan/delete/').$data->id_kendaraan?>" class="btn btn-danger" title="Hapus Kendaraan" onclick="return confirm('Apakah anda yakin untuk menghapus data Kendaraan ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>