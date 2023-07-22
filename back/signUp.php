<?php

session_start();
require_once 'dbConnection.php';


function getMaxId($connexion) {
     // Effectuer la requête pour vérifier les informations d'identification dans la base de données
     $query = "SELECT max(idUser) as maxId FROM users";
     $result = $connexion->query($query);
     $value = 0;
     if(mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        $value = (int)$row['maxId'];
     }
     return $value;

     
}

    function createAccout($connexion) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $user_name = $_POST["usernameSignUp"];
            $user_password = password_hash($_POST["passwordSignUp"], PASSWORD_DEFAULT);

            $connexion->autocommit(false);
            $isCommit = false;

            try {
                // Effectuer la requête pour vérifier les informations d'identification dans la base de données
                $query = "INSERT INTO users (user_name, user_password) values (? , ?) ";
                $stmt = $connexion->prepare($query);
                
                // iss = Integer, String, String
                $stmt->bind_param("ss", $user_name, $user_password);

                $stmt->execute();

                $isCommit = $connexion->commit();
            } catch(mysqli_sql_exception $exception) {
                $connexion->rollback();
                $_SESSION['inscription_reussi'] = 'false';
                header("Location: ../front/signUpPage");
            }
            
        }
        return $isCommit;
    }

    if(createAccout($conn)==true) {
        $_SESSION['inscription_reussi'] = 'true';
        header("Location: ../front/signUpPage");
    }
?>