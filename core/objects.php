<?php
namespace objects {

    include 'dbRequests.php';
    use dbase\Requests;

    Class User {
        public $name, $surname, $login, $password,$role='user';
        public static $table = 'users';
        public function __construct($login, $password, $name=NULL, $surname=NULL){
            $this -> login = $login;
            $this -> password = $password;
            if(!$name && !$surname){
                $user = Requests::read('users');
                foreach ($user as $var) {
                    if (in_array($this->login,$var) && password_verify($this->password,$var['password'])) {
                        $this -> name = $var['name'];
                        $this -> surname = $var['surname'];
                        $this -> Login();
                        return 'вы успешно авторизованы';
                    }
                }
                return 'неверный логин или пароль';
            }
            else {
                $this->name = $name;
                $this->surname = $surname;
            }
        }

        public function Registrate(){
            $users = Requests::read('users');
            foreach ($users as $var) {
                if (!in_array($this->login, $var)) {
                    Requests::create('users', [$this->name, $this->surname, $this->login, $this->password]);
                    $this->Login();
                    return 'вы успешно зарегестрированы';
                } else {
                    return 'пользователь с таким логином уже зарегестрирован';
                }
            }
        }

        public function Login(){
            setcookie('user',$this->login,time() + 3600,'/');
            session_start([
                'cookie_lifetime' => 3600,
            ]);
            header('Location:/newSite/');
        }

        public function Update($values){
            Requests::update('users', $_COOKIE['id'],$values);
        }

        public function Delete(){
            Requests::delete('user',$_COOKIE['id']);
        }

        public static function Get(array $where = NULL,$orderBy='id'){
            return Requests::read(self::$table,$orderBy,$where);
        }
    }

    class Admin extends User{
        public function __construct($name, $number, $password){
            parent::__construct($name, $number, $password,"admin");
        }
    }

    class Product{
        public $name, $price, $count;
        public static $table='products';
        public function __construct($name, $price, $count){
            $this -> name = $name;
            $this -> price = $price;
            $this -> count = $count;
        }
        public function AddProduct(){
            Requests::create('products',[$this -> name,$this -> price,$this -> count]);
        }
        public static function Get(array $where = NULL,$orderBy='id'){
            return Requests::read(self::$table,$orderBy,$where);
        }
    }

    class Order{
        public $date,$userId,$bill;
        public static $table='orders';
        public function __construct($date, $userId, $bill){
            $this -> date = $date;
            $this -> userId = $userId;
            $this -> bill = $bill;
        }
        public function CreateOrder(){
            Requests::create(self::$table,[$this -> date,$this -> userId,$this -> bill]);
        }
    }

    class Category{
        public $name;
        public static $table='category';
        public function __construct($name){
            $this -> name = $name;
        }
        public static function Get(){
            return Requests::read(self::$table);
        }
    }
}
