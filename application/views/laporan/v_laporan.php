<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    <div class="card">
        <h5 class="card-header">Filter</h5>
        <div class="card-body">
            <form action="<?= site_url('Laporan/cari') ?>" method="get">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bulan</label>
                        <input type="month" id="date" name="bulan" value="" class="form-control" id="staticEmail">
                    </div>
                    <button type="submit" name="submit" id="btnCari" class="btn btn-primary">Cari</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<div class="col-md-12 content">
    <div class="card">
        <h5 class="card-header">Tabel Laporan</h5>
        <?php if(isset($_GET['submit'])){?>
        <form action="<?= site_url('Laporan/export') ?>" method="post">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" value="<?= $this->input->get('bulan') ?>" class="form-control" name="bulan">
                </div>
                <button type="submit" id="btnPrint" class="btn btn-secondary"><i class="fa fa-print"></i> Export</button>
            </div>
        </form> 
        <?php }?>

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
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        if(count($pemesanan) > 0){
                            foreach($pemesanan as $data){ 
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
                    </tr>
                    <?php }}else{?>
                    <tr>
                        <td colspan=7>Tidak ada data</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
        $("#btnCari").click(function(){
            var cariBulan = $("#cariBulan").val();
            $("#btnPrint").show();
            $("#bulan").val(cariBulan);
        });
</script>