<?php

session_start();

require_once 'dbConnection.php';

function connect($connexion) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $user_name = $_POST["username"];
        $user_password = $_POST["password"];

        // Effectuer la requête pour vérifier les informations d'identification dans la base de données
        $query = "SELECT * FROM users WHERE user_name = ?";
        $stmt = $connexion->prepare($query);
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if(mysqli_num_rows($result) == 1) {
            $row = $result->fetch_assoc();
            $hashedPwd = $row['user_password'];
            $user_base = $row['user_name'];

            if (password_verify($user_password, $hashedPwd) && $user_base === $user_name) {
            // Authentification réussie
                // Vous pouvez maintenant rediriger l'utilisateur vers une page de succès ou effectuer d'autres actions
                $connexion->autocommit(false);
                $query = "INSERT INTO hist_connexion (user_name, time_connexion) VALUES (?, now())";
                $stmt = $connexion->prepare($query);
                $stmt->bind_param("s", $user_name);
                $stmt->execute();
                $connexion->commit();
                $_SESSION['user_name'] = $user_name;

                 // Effectuer la requête pour vérifier les informations d'identification dans la base de données
                $query = "SELECT count(*) as total FROM hist_connexion WHERE user_name = ?";
                $stmt = $connexion->prepare($query);
                $stmt->bind_param("s", $user_name);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $total = $row['total'];
                $_SESSION['total_connexion'] = $total;
                

                // connexion journalière
                $query = "SELECT count(*) as dailyConnexion 
                            FROM hist_connexion 
                            where date(time_connexion) =  CURDATE() and user_name = ?";
                $stmt = $connexion->prepare($query);
                $stmt->bind_param("s", $user_name);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $dailyConnexion = $row['dailyConnexion'];
                
                $_SESSION['dailyConnexion'] = $dailyConnexion;
                
                header("Location: ../front/home"); // Remplacez "success.php" par la page souhaitée
            } else {
                // Authentification échouée
                // Vous pouvez rediriger l'utilisateur vers une page d'échec ou afficher un message d'erreur
                $_SESSION['wrong_password'] = 'true';
                header("Location: ../front/home");
                
            }
        } else {
            // Authentification échouée
            // Vous pouvez rediriger l'utilisateur vers une page d'échec ou afficher un message d'erreur
            $_SESSION['wrong_password'] = 'true';
            header("Location: ../front/home");
            
        }
    }
}

connect($conn);
?>