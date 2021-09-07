<?php if($this->session->flashdata('messages')){ ?>
<div class="row">
    <div class="col-md-12 content">
        <?= $this->session->flashdata('messages') ?>
    </div>
</div>
<?php }?>
<div class="col-md-12 content">
    
    <div class="card">
        <h5 class="card-header">Tabel Log Aktivitas</h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">User</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Item</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($log as $data){ 
                    ?>
                    <tr>
                        <th scope="row"><?= $no++?></th>
                        <td><?= $data->tanggal?></td>
                        <td><?= $data->log_user?></td>
                        <td><?= $data->log_tipe?></td>
                        <td><?= $data->log_aksi?></td>
                        <td><?= $data->log_item?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>