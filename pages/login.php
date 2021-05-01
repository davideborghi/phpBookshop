<?php 
    require_once('../constants.php');
    //echo PROJECT_PATH.'services/utenteService.php';
    require_once(PROJECT_PATH.'services/utenteService.php');
    if(isset($_POST['email']) && isset($_POST['password'])){
        $utenteService = new UtenteService();
        $login = $utenteService->login($_POST['email'], $_POST['password']);
        $_SESSION['CURRENT_USER'] = $login;
        session_start();
        header('Location: /');
        
    }
?>
<html>


<head>
    <title>
        MondaMari
    </title>
    <script type="text/javascript" src="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= PROJECT_FOLDER?>assets/styles.css" />
</head>

<body>
    <?php require(PROJECT_PATH.'/components/navbar.php') ?>

    <form action="<?=PROJECT_FOLDER?>pages/login.php" method="POST">
        <div class="container mt-10">
            <div class="row">
                <div class="col-4">
                    Email:
                </div>
                <div class="col-8">
                    <input type="email" name="email" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    Password:
                </div>
                <div class="col-8">
                    <input type="password" name="password" class="form-control" required />
                </div>
                </div>
                <div class="row">

                    <div class="col-4">

                    </div>
                    <div class="col-8">
                        <input type="submit" name="login" class="form-control btn btn-success" value="Login" />
                    </div>
                </div>
                <?php
                if (isset($login) && $login == "Login_FAILED"){?>
                   <div class="alert alert-danger" role="alert">
                        Autenticazione fallita - Credenziali Errate
                    </div> 

                <?php

                }?>
            
        </div>
    </form>





</body>

</html>