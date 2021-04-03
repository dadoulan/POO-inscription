<?php 

    class Securite {

      public static function chiffrer($password){
        return "1a3".sha1($password.'giga').'5131';
      }

    }