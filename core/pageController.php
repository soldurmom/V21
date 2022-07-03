<?php
namespace Controller {
    session_start();

    include 'validate.php';
    include "objects.php";
//    include 'public/templater.php';

//    use Temp\Templates;
    use objects\Admin;
    use objects\Category;
    use objects\User;
    use objects\Product;
    use valid\Fields;
    use valid\UserFields;

    class Web{
        public static function catalog(array $arr=NULL){
            $category = Category::Get();
            $products = [];
            isset($_GET['order_by']) ? $orderBy=$_GET['order_by'] : $orderBy = 'id';
            if(isset($_GET['category'])) {
                $products = Product::Get(['key' => 'category_id', 'value' => $_GET['category']],$orderBy);
            }
            if(!$products){
                $products = Product::Get(NULL,$orderBy);
            }
            $title = 'Home';
            include('public/layout.php');
            include('public/templates/home.php');
        }
        public static function about(array $arr=NULL){
            $title = 'About';
            include('public/layout.php');
            include('public/templates/about.php');
        }
        public static function admin(array $arr=NULL){
            if(!isset($_POST['slider'])) {
                $title = 'Admin';
                include('public/layout.php');
                include('public/Admin/admin.php');
            }
            else{
                $slider=$_POST['slider'];
                include('public/Admin/sliders/'.$slider.'.php');
            }
        }
        public static function adminCreate(array $arr){

        }
        public static function RegisterUser(array $arr=NULL){
            $title = 'register';
            include('public/layout.php');
            if(!isset($_POST['login'])){
                include('public/templates/register.html');
            }
            else {
                $user = new User($_POST['login'], password_hash($_POST['password'],PASSWORD_DEFAULT), $_POST['name'], $_POST['surname']);
                $user -> Registrate();
            }
        }
        public static function LoginUser(array $arr=NULL, $user=NULL){
            $title = 'login';
            include('public/layout.php');
            if($user){
                $user -> Login();
            }
            else{
                include('public/templates/login.html');
                if (isset($_POST['login'])){
                    $user = new User($_POST['login'], $_POST['password']);
                }
            }
        }
        public static function logout(){
            setcookie('user','false',time() - 3600,'/');
            session_unset();
            header('Location:/newSite/login');
        }
        public static function catalogsProduct($id){
            $product = Product::Get(['key' => 'id', 'value' => $id,])[0];
            $title = $product['name'];
            include('public/layout.php');
            include('public/templates/product.php');
        }
        public static function cart(){
            $title = 'cart';
            include('public/layout.php');
            include('public/templates/cart.php');
        }
        public static function cartControl($id,$action){
            $product = Product::Get(['key' => 'id', 'value' => $id,])[0];
            $cartItem = [];
            if(isset($_SESSION['cart'][$product['id']])){
                if($action=='add' && $_SESSION['cart'][$product['id']]['count']<$product['count']){
                    $_SESSION['cart'][$product['id']]['count'] += 1;
                }
                else if($action=='rem'){
                    $_SESSION['cart'][$product['id']]['count'] -= 1;
                    $_SESSION['cart.count'] -= 1;
                    $_SESSION['cart.price'] -= $product['price'];
                }
            }
            else if($product){
                $_SESSION['cart'][$product['id']] = array(
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'count' => 1,
                );
            }
            if($action=='add' && $_SESSION['cart'][$product['id']]['count']<$product['count']){
                $_SESSION['cart.count'] = !empty($_SESSION['cart.count']) ? ++$_SESSION['cart.count'] : 1;
                $_SESSION['cart.price'] = !empty($_SESSION['cart.price']) ? $_SESSION['cart.price'] + $product['price'] : $product['price'];
            }

            $cartItem['totalCount'] = $_SESSION['cart.count'];
            $cartItem['totalPrice'] = $_SESSION['cart.price'];

            if($_SESSION['cart'][$product['id']]['count'] <= 0){
                unset($_SESSION['cart'][$product['id']]);
                echo json_encode($cartItem);
            }
            else{
                $cartItem['item'] = $_SESSION['cart'][$product['id']];
                echo json_encode($cartItem);
            }
        }
        public static function notFound(){
            include('public/templates/404page.html');
        }
    }
}