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
                        <th scope="col">Status Konfirmasi Pihak Pertama</th>
                        <th scope="col">Status Konfirmasi Pihak Kedua</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($pihak_pertama as $data){ 
                            if($data->status_konfirmasi_pihak_pertama == 0 && $data->status_konfirmasi_pihak_kedua == 0){
                                $status_pemakaian = '<button disabled class="btn btn-success">Pakai Kendaraan</button>';
                            }else{
                                $status_pemakaian = '<a href="'.site_url('Pemesanan/pakai/').$data->id_pemesanan.'" class="btn btn-success" title="Pakai Kendaraan">Pakai Kendaraan</a>';
                            }

                            if($data->status_konfirmasi_pihak_pertama == 0){
                                $status_konfirmasi_pertama = '<a href="'.site_url('Pemesanan/konfirmasiPemesananPihakPertama/').$data->id_pemesanan.'" class="btn btn-success" title="Konfirmasi Pemesanan">Konfirmasi Pemesanan</a>';
                                $status_konfirmasi_pihak_pertama = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                            }else{
                                $status_konfirmasi_pertama = '<button disabled class="btn btn-success">Konfirmasi Pemesanan</button>';
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
                        <td><?= $status_konfirmasi_pihak_pertama?></td>
                        <td><?= $status_konfirmasi_pihak_kedua?></td>
                        <td>
                            <?= $status_konfirmasi_pertama?>
                        </td>
                    </tr>
                    <?php }?>

                    <?php 
                        foreach($pihak_kedua as $data){ 
                            if($data->status_konfirmasi_pihak_pertama == 0 && $data->status_konfirmasi_pihak_kedua == 0){
                                $status_pemakaian = '<button disabled class="btn btn-success">Pakai Kendaraan</button>';
                            }else{
                                $status_pemakaian = '<a href="'.site_url('Pemesanan/pakai/').$data->id_pemesanan.'" class="btn btn-success" title="Pakai Kendaraan">Pakai Kendaraan</a>';
                            }

                            if($data->status_konfirmasi_pihak_pertama == 0){
                                $status_konfirmasi_pihak_pertama = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                            }else{
                                $status_konfirmasi_pihak_pertama = '<span class="badge badge-success">Terkonfirmasi</span>';
                            }

                            if($data->status_konfirmasi_pihak_kedua == 0){
                                if($data->status_konfirmasi_pihak_pertama == 0){
                                    $status_konfirmasi_kedua = '<button disabled class="btn btn-success">Konfirmasi Pemesanan</button>';
                                }else{
                                    $status_konfirmasi_kedua = '<a href="'.site_url('Pemesanan/konfirmasiPemesananPihakKedua/').$data->id_pemesanan.'" class="btn btn-success" title="Konfirmasi Pemesanan">Konfirmasi Pemesanan</a>';
                                }
                                $status_konfirmasi_pihak_kedua = '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                            }else{
                                $status_konfirmasi_kedua = '<button disabled class="btn btn-success">Konfirmasi Pemesanan</button>';
                                $status_konfirmasi_pihak_kedua = '<span class="badge badge-success">Terkonfirmasi</span>';
                            }    
                    ?>
                    <tr>
                        <th scope="row"><?= $no++?></th>
                        <td><?= $data->nama_kendaraan?></td>
                        <td><?= $data->nama_driver?></td>
                        <td><?= $status_konfirmasi_pihak_pertama?></td>
                        <td><?= $status_konfirmasi_pihak_kedua?></td>
                        <td>
                            <?= $status_konfirmasi_kedua?>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>