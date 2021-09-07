<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?= base_url().'assets/css/style.css'?>">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400&family=Open+Sans&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url().'assets/font-awesome/css/font-awesome.min.css' ?>">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
        <title><?= $title?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Sekawan Media</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php if($this->session->userdata('role') == 1){?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Dashboard/admin') ?>">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('LogAktivitas') ?>">Log Aktivitas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kelola
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= site_url('Driver') ?>">Driver</a>
                            <a class="dropdown-item" href="<?= site_url('Kendaraan') ?>">Kendaraan</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Pemesanan/admin') ?>">Pemesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Laporan') ?>">Laporan</a>
                    </li>
                    <?php }?>

                    <?php if($this->session->userdata('role') == 2){?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Dashboard/admin') ?>">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Pemesanan/pihak_setuju') ?>">Pemesanan</a>
                    </li>
                    <?php }?>

                    <?php if($this->session->userdata('role') == 3){?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('Dashboard/pegawai') ?>">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('Pemesanan/pegawai') ?>">Pemesanan</a>
                    </li>
                    <?php }?>
                </ul>
                <ul class="navbar-nav">
                    <?php if($this->session->userdata('role') == 1){
                        $countNotif = $this->db->get_where('pemesanan', array('status_konfirmasi_admin' => 0))->num_rows();    
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell" aria-hidden="true"></i>&nbsp;<span class="badge badge-danger"><?= $countNotif ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= site_url('Pemesanan/admin') ?>" type="button">Terdapat <?= $countNotif ?> pemesanan baru</a>
                        </div>
                    </li>
                    <?php }?>

                    <?php if($this->session->userdata('role') == 2){
                        $countNotifPihakPertama = $this->db->get_where('pemesanan', array('status_konfirmasi_pihak_pertama' => 0, 'id_pihak_pertama' => $this->session->userdata('id_user')))->num_rows();    
                        $countNotifPihakKedua   = $this->db->get_where('pemesanan', array('status_konfirmasi_pihak_kedua' => 0, 'id_pihak_kedua' => $this->session->userdata('id_user')))->num_rows();   
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell" aria-hidden="true"></i>&nbsp;<span class="badge badge-danger"><?= ($countNotifPihakPertama + $countNotifPihakKedua)?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= site_url('Pemesanan/pihak_setuju') ?>" type="button">Terdapat <?= ($countNotifPihakPertama + $countNotifPihakKedua) ?> pemesanan baru</a>
                        </div>
                    </li>
                    <?php }?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $this->session->userdata('nama_lengkap') ?> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= site_url('Login/logout') ?>" type="button">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav> 	
    <div class="container-fluid main-container">
        <?php $this->load->view($content) ?>

        <!-- <footer class="pull-left footer">
            <p class="col-md-12">
            <hr class="divider">
            Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>
            </p>
        </footer> -->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>