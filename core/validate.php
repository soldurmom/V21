<?php
namespace valid {/*

    include 'objects.php';

    use objects\Product;
    use objects\User;

    class Fields
    {
        public $prodName, $price, $count;

        public static function checkString(string $str, $min, $max)
        {
            $result = '';
            if (!ctype_digit($str)) {
                $result .= 'is alpha ';
            } elseif (ctype_alpha($str)) {
                $result .= 'is digit ';
            } else {
                $result .= 'is mixed ';
            }
            return strlen($str) <= $max && strlen($str) >= $min ? $result .= 'and true length' : $result .= 'but false length';
        }
    }

    class UserFields extends Fields
    {
        public $login, $name, $password;

        public static function checkLogin($login)
        {
            if (isset(User::Get([ 'key' => 'login', 'value' => $login])[0])){
                return false;
            }
            return true;
        }
        public static function checkPassword(){

        }
    }
*/}