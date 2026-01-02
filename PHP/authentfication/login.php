<?php
    session_start();
    
    // Make sure the path is correct - use require_once
    require_once __DIR__ . '/../tools/db.php';
    
    // Debug: Check if connection exists
    if (!$con) {
        die("Database connection failed!");
    }

    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM compte WHERE nomUtilisateur = :username";
        $stmt = oci_parse($con, $sql);
        oci_bind_by_name($stmt, ':username', $username);
        oci_execute($stmt);
        
        $user = oci_fetch_assoc($stmt);
        
        if($user){
            // Oracle returns UPPERCASE column names
            if ($password == $user['MOTDEPASSE']) {
                $_SESSION['name'] = $user['NOMUTILISATEUR'];
                $_SESSION['email'] = $user['EMAIL'];
                
                if ($user['ROLE'] == 'chef') {
                    header("Location: ../chefagence/chef_page.php");
                } elseif($user['ROLE'] == 'guichetier'){
                    header("Location: ../guichetier/guichetier_page.php");
                } else {
                    header("Location: ../client/client_page.php");
                }
                exit();
            }
        }
        
        oci_free_statement($stmt);
        
        $_SESSION['login_error'] = 'Incorrect username or password';
        header("Location: connexion.php");
        exit();
    }
?>