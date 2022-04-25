<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7bc0885a91.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://agenciaduetto.com.br/pass/assets/images/cropped-favicon-192x192.png" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

</head>

<body class="text-center login">

    <div class="container">
        <div class="row g-0">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="darkBlock d-flex align-items-center d-flex justify-content-center">
                    <img width="300px" src="<?php echo base_url('assets/images/logo-branco.png') ?>" alt="Logo Duetto">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="formBlock">
                    <form class="form-signin" method="POST">
                        <?= $this->session->flashdata('erro_login'); ?>

                        <h1 class="h3 mb-3">Bem-vindo!</h1>
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
                        <label for="inputPassword" class="sr-only">Senha</label>
                        <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
                        <button class="btn btn-lg btn-outline-success btn-block" type="submit">Login</button>
                        <p class="mt-5 mb-3">&copy; <?php echo date("Y"); ?> </p>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- JS -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>