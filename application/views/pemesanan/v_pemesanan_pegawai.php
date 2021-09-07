<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    
    <a href="<?php echo site_url('Pemesanan/add')?>" class="btn btn-primary btn-add">Tambah Data</a>
    
    <div class="card">
        <h5 class="card-header">Tabel Pemesanan</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Nama Driver</th>
                        <th scope="col">Status Konfirmasi Admin</th>
                        <th scope="col">Status Konfirmasi Pihak Pertama</th>
                        <th scope="col">Status Konfirmasi Pihak Kedua</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($pemesanan as $data){ 
                            if($data->status_konfirmasi_pihak_pertama == 0 && $data->status_konfirmasi_pihak_kedua == 0){
                                $status_pemakaian = '<button disabled class="btn btn-success">Pakai Kendaraan</button>';
                            }else{
                                $status_pemakaian = '<a href="'.site_url('Pemesanan/pakai/').$data->id_pemesanan.'" class="btn btn-success" title="Pakai Kendaraan">Pakai Kendaraan</a>';
                            }

                            if($data->status_konfirmasi_admin == 0){
                                $status_konfirmasi_admin = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                            }else{
                                $status_konfirmasi_admin = '<span class="badge badge-success">Terkonfirmasi</span>';
                            }

                            if($data->status_konfirmasi_pihak_pertama == 0){
                                $status_konfirmasi_pihak_pertama = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                            }else{
                                $status_konfirmasi_pihak_pertama = '<span class="badge badge-success">Terkonfirmasi</span>';
                            }

                            if($data->status_konfirmasi_pihak_kedua == 0){
                                $status_konfirmasi_pihak_kedua = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                            }else{
                                $status_konfirmasi_pihak_kedua = '<span class="badge badge-success">Terkonfirmasi</span>';
                            }     
                    ?>
                    <tr>
                        <th scope="row"><?= $no++?></th>
                        <td><?= $data->nama_kendaraan?></td>
                        <td><?= $data->nama_driver?></td>
                        <td><?= $status_konfirmasi_admin?></td>
                        <td><?= $status_konfirmasi_pihak_pertama?></td>
                        <td><?= $status_konfirmasi_pihak_kedua?></td>
                        <td><?= $data->tanggal_pemesanan?></td>
                        <td>
                            <?= $status_pemakaian?>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>