<?php 

    class Verifier {

      public static function syntaxeEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          return true;
        } else {
          return false;
        }
      }

      public static function doublonEmail($email){

        require('src/connexion.php');
        $req = $bdd->prepare('SELECT COUNT(*) AS nombre FROM utilisateurs WHERE email = ?');
        $req->execute([$email]);

        while($emailBDD = $req->fetch()){

          if($emailBDD['nombre'] != 0){
            return true;
          } else {
            return false;
          }
        }

      }
    }