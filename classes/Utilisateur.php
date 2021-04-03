<?php 

    class Utilisateur {

      // Attributs
      private $_pseudo;
      private $_email;
      private $_password;

      // Constructeurs 
      public function __construct($pseudo, $email, $password){

        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);

      }

      // Getteurs 
      public function getPseudo(){
        return $this->_pseudo;
      }
      public function getEmail(){
        return $this->_email;
      }
      public function getPassword(){
        return $this->_password;
      }

      // Setters
      public function setPseudo($pseudo){
        $this->_pseudo = $pseudo;
      }
      public function setEmail($email){
        $this->_email = $email;
      }
      public function setPassword($password){
        $this->_password = $password;
      }

      // Methodes
      public function enregistrer(){

        require('src/connexion.php');
        $requete = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(?,?,?)');
        $requete->execute([
          $this->getPseudo(),
          $this->getEmail(),
          $this->getPassword(),
        ]);

      }

      public function creerLesSessions(){

        $_SESSION['connect'] = 1;
        $_SESSION['pseudo'] = $this->getPseudo();
        $_SESSION['email'] = $this->getEmail();


      }
    }