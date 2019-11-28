<?php

    class Validator{

        public static function validate_email($email)
        {
            if(empty($email))
            {
                return false;
            }

            $reg="/^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/";
            if(preg_match_all($reg, $email))
            {
                return true;
            }
            return false;
        }

        public static function validate_password($password)
        {
            if(empty($password))
            {
                return false;
            }

            $reg1="/[a-z]+/";
            $reg2="/[A-Z]+/";
            $reg3="/[0-9]+/";
            $reg4="/[!@#$%^&*(){}+=|\/?.]+/";
            $reg5 = "/[\s]/";

            //toutes les conditions (si true == condition de fail)
            switch(true){
                case(!preg_match($reg1,$password)):
                    return false;
                case(!preg_match($reg2,$password)):
                    return false;
                case(!preg_match($reg3,$password)):
                    return false;
                case(!preg_match($reg4,$password)):
                    return false;
                case(preg_match($reg5,$password)):
                    return false;
                case(strlen($password) < 8):
                    return false;
            }

            //si toutes les conditions de fail ne sont pas satisfaite, retourn true (le password est valide)
            return true;
        }

        public static function sanitize($input){
            $input = stripslashes($input);
            $input = htmlentities($input);
            $input = strip_tags($input);
            return $input;
        }

        
    }


?>
