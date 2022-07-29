<?php

require_once 'config.php';
        
        if (isset($_POST['nom'])  && isset($_POST['prenom']) && isset($_POST['numero'])  && isset($_POST['email']) 
        && isset($_POST['password'])  && isset($_POST['confirm_password'])) 
        {
           $nom = htmlspecialchars($_POST['nom']);
           $prenom = htmlspecialchars($_POST['prenom']);
           $numero = htmlspecialchars($_POST['numero']);
           $email = htmlspecialchars($_POST['email']);
           $password = htmlspecialchars($_POST['password']);
           $confirm_password = htmlspecialchars($_POST['confirm_password']);
           $mot_de_pass = md5($password, $confirm_password);
        
                $check = $dbb->prepare('SELECT nom, prenom, numero, email, mot_de_pass FROM conexion_utilisateur WHERE email=?');
                $data= $check->fetch();
                $row= $check->rowCount();
               
                        if(strlen($email) <= 100){
                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                {
                                        $insert = $dbb->prepare('INSERT INTO conexion_utilisateur
                                        ( nom, prenom, numero, email,mot_de_pass) 
                                        VALUES(?,?,?,?,?)');
                                        {
                                                $insert->execute(array( 
                                                        
                                                        'nom' => $nom,
                                                        'prenom' => $prenom,
                                                        'numero' => $numero,
                                                        'email' => $email,
                                                        'mot_de_pass' => $mot_de_pass
                                                ));
                                                 echo header('Location:conexion.php');
                                                 var_dump($_POST);
                                        } 
                                       
                                }
                        }else{
                               echo  header('Location:index.php');
                        }
        }
        else{
                echo  header('Location:index.php');
         }
 


?>