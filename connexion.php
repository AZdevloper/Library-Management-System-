<?php
            $servername = 'localhost';
            $database = 'library_mgs';
            $username = 'root';
            $password = 'root';
            
            //On essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
                // $sql ="SELECT * FROM `book` WHERE 1";
                // $result = $conn->query($sql);
             
                //    foreach( $result as $row ) {

                //     echo "<pre>";
                //          var_dump($row);
                //     echo "</pre>";
             
                //    }
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
    ?>