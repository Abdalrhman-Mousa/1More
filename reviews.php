<?php
require_once './config.php';
require_once './functions.php';
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_SESSION["email"])) {
    $activeUser = getOneByEmail('users', $_SESSION["email"]);
}

$user_id = $activeUser['id'];
$product_id = $_POST["productid"];
$rating =  $_POST["rating"];
$review = $_POST["review"];


$sql = "INSERT INTO reviews (user_id,product_id,stars,review)
      VALUES (:user_id,:product_id,:stars,:review)";
$stmt = $conn->prepare($sql);
$query = $stmt->execute([
    ":user_id" => $user_id,
    ":product_id" => $product_id,
    ":stars" => $rating,
    ":review" => $review
]);



$url = $_SESSION["current_page"];
header("Location: $url");
