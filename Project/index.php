<?php 
$allowed = ['header', 'hobby', 'footer', 'home', 'contact'];
$page = $_GET['page'] ?? 'home';

/*
include 'includes/header.php';
include 'includes/footer.php';
include 'includes/footer.php';

switch ($page){
    case 'header':
        include 'header.php';
        break;

    case 'footer':
        include 'footer.php';
        break;
    case 'hobby':
        include 'hobby.php';
        break;          
}
*/

if (in_array($page,$allowed)){
    include $page . '.php';
} else {
    http_response_code(404);
    echo '<h2>NOT FOUND</h2>';}
?>