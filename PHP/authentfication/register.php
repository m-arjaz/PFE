<?php 
    session_start();
    require_once '../tools/db.php';

    if(isset($_POST['register'])){
        $name = $_POST['nom'];
        $username = $_POST['username'];
        $dateN = $_POST['date_Naissance'];
        $lieuN = $_POST['lieu_Naissance'];
        $cin = $_POST['cin'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $telephone = $_POST['tele'];
        $role = $_POST['role'];
        $password = $_POST['password'];

        $checkEmail = $con->query("SELECT email FROM compte WHERE email = '$email' ");
        if($checkEmail->num_rows > 0){
            $_SESSION['register_error'] = 'Email is already registered';
            $_SESSION['active_form'] = 'register';
            header("Location: inscription.php");
        }else{
            if($role == 'client'){
                $con->query("INSERT INTO client(nom,date_naissance,lieu_naissance,cin,adresse,email,telephone) VALUES ('$name','$dateN','$lieuN','$cin','$adresse','$email','$telephone') ");
                $con->query("INSERT INTO compte(nomUtilisateur,motDePasse,autorise,role,email) VALUES ('$username','$password','1','$role','$email')");
            }else{
                $con->query("INSERT INTO employe(nom,dateNaissance,lieuNaissance,adresse,cin,email,telephone) VALUES ('$name','$dateN','$lieuN','$adresse','$cin','$email','$telephone') ");
                $con->query("INSERT INTO compte(nomUtilisateur,motDePasse,autorise,role,email) VALUES ('$username','$password','1','$role','$email')");
            }
            header("Location: connexion.php");
        }
        
        exit();
    }
?>