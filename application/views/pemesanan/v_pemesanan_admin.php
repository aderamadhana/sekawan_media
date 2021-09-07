<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
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
                            if($data->status_konfirmasi_admin == 0){
                                $status_konfirmasi_admin = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                $status_konfirmasi = '<a href="'.site_url('Pemesanan/konfirmasiPemesanan/').$data->id_pemesanan.'" class="btn btn-success" title="Konfirmasi Pemesanan">Konfirmasi Pemesanan</a>';
                            }else{
                                $status_konfirmasi_admin = '<span class="badge badge-success">Terkonfirmasi</span>';
                                $status_konfirmasi = '<button disabled class="btn btn-success">Konfirmasi Pemesanan</button>';
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

                            if($data->status_konfirmasi_admin == 0 && $data->status_konfirmasi_pihak_pertama == 0 && $data->status_konfirmasi_pihak_kedua == 0){
                                
                            }else{
                                
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
                            <?= $status_konfirmasi?>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>