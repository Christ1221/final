<?php

$servername = "sql211.infinityfree.com";
$username = "if0_37557160";
$password = "CO5eJugDjKuV";
$dbname = "if0_37557160_books_db";

$conn = new mysqli($servername, $username, $password, $dbname);


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $update_id = $_POST["updateS1"];

    $titleId = $_POST["title"];
    $authorId = $_POST["author"];
    $genreId = $_POST["genre"];
    $publisherId = $_POST["publisher"];
    $publisherAddressId = $_POST["publisherAddress"];
    $stockId = $_POST["stock"];

    $sql = $conn->prepare("UPDATE book SET title = ?, author = ?, genre = ?, publisher = ?, publisherAddress = ?, stock = ? 
    WHERE id = ?");

    $sql->bind_param("ssssssi", $titleId, $authorId, $genreId, $publisherId, $publisherAddressId, $stockId, $update_id);

    $sql->execute();

    $sql->close();


}




$conn->close();


?>
