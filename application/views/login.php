<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?= base_url().'assets/css/style.css'?>">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400&family=Open+Sans&display=swap" rel="stylesheet">

		<title>Login</title>
	</head>
	<body>
        <div class="container">
            <?= $this->session->flashdata('messages') ?>
            <div class="row login">
                <div class="col-md-4 col-md-offset-4">

                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="col-md-12 content">
                        <div class="card">
                            <h5 class="card-header">Login</h5>
                            <div class="card-body">
                                <form action="<?= site_url('Login/doLogin') ?>" method="post">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
