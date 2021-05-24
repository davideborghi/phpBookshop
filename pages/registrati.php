<?php 

    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
    //echo PROJECT_PATH.'services/utenteService.php';
    require_once(PROJECT_PATH.'services/utenteService.php');
    
    
    if(isset($_POST["email"])){
        //verifica se è stata fatta chiamata ajax per la disponibilità dell'utenza
        $uteService = new UtenteService();
        $exists= $uteService->nomeUtenteDisponibile($_POST['email']);
        die();
    }
    //var_dump($user);
    
?>
<html>


<head>
    <title>
        MondaMari
    </title>
    <?php require(PROJECT_PATH.'/components/scripts.php');?>
    <script type="text/javascript">
    $(document).ready(function() {
        
        

        $("#email").change(function(){
            emailChange();
        });
        $("#confermaEmail").change(function(){
            emailChange();
        })
        function emailChange(){
            if ($("#email").val().trim() != $("#confermaEmail").val().trim()){
                
                $("#mailErrorRow").removeClass('d-none');
                $("#emailNonCorrispondono").removeClass('d-none');
            }else{
                $("#mailErrorRow").addClass('d-none');
                $("#emailNonCorrispondono").addClass('d-none');

                $.post("<?=PROJECT_FOLDER?>pages/registrati.php", {email: $( "#email" ).val().trim()})
                    .done(function( data ) {
                        if (data == "KO"){
                            $("#mailErrorRow").removeClass('d-none');
                            $("#emailGiaRegistrata").removeClass('d-none');
                        }
                        else{
                            $("#mailErrorRow").addClass('d-none');
                            $("#emailGiaRegistrata").addClass('d-none');
                        }
                    });
            }
        }
        $("#password").change(function(){
            passwordChange();
        });
        $("#confermaPassword").change(function(){
            passwordChange();
        })
        function passwordChange(){
            if ($("#password").val().trim() != $("#confermaPassword").val().trim()){
                
                $("#password-row-error").removeClass('d-none');
                
            }else{
                $("#password-row-error").addClass('d-none');
                
            }
        }
    });

    </script>
</head>

<body>
    <?php require(PROJECT_PATH.'/components/navbar.php');?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">
                    Inserisci i tuoi dati:
                </h1>
            </div>

        </div>

        <form method='post' id="registration-form" action="<?=PROJECT_FOLDER?>pages/profilo.php">
        <div class="row">
        
            <div class="col-4">
                Email:
            </div>
            <div class="col-8">
                
                <input type="email" id="email" class="form-control" name="email" />
                
            </div>
        </div>
        <div class="row">
        
            <div class="col-4">
                Conferma Email:
            </div>
            <div class="col-8">
                
                <input type="email" id="confermaEmail" class="form-control" name="confermaEmail"  />
                
            </div>
            
        </div>
        
        <div class="row d-none" id="mailErrorRow">
            <div class="col">
            <div class="alert alert-success d-none" id="indirizzoEmailValido" role="alert">
                    Nome utente disponibile
                </div> 
            <div class="alert alert-danger d-none" id="emailNonCorrispondono" role="alert">
                Le email non corrispondono
            </div> 
            <div class="alert alert-danger d-none" id="emailGiaRegistrata" role="alert">
                L'email inserita è già presente a sistema
            </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Nome:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="nome" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Cognome:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="cognome" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Password:
            </div>
            <div class="col-8">
                <input type="password" id="password" class="form-control" name="password" value="" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Password:
            </div>
            <div class="col-8">
                <input type="password" id="confermaPassword" class="form-control" name="confermaPassword" value="" />
            </div>
        </div>
        <div class="row d-none" id="password-row-error">
            <div class="col">
                <div class="alert alert-danger" id="passwordNonCorrispondonoError" role="alert">
                    Le password non corrispondono
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <input type="submit" class="btn btn-success" name="ModificaProfilo" value="Conferma Registrazione" />
            </div>
        </div>
        </form>
    </div>

</body>

</html>