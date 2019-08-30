<?php
require_once "Book.php";

//create an object of class CarActivity yo use the methods & properties
$book = new Book;

if(isset($_POST['submit'])){
    $author = $_POST['author'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $summary = $_POST['summary'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $book->setValues($author, $title, $date, $summary, $price, $quantity);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <form method="post">
        <label>Aurhor</label>
        <input type="text" name="author"><br>
        <label>Title</label>
        <input type="text" name="title"><br>
        <label>Date</label>
        <input type="date" name="date"><br>
        <label>Summary</label>
        <input type="text" name="summary"><br>
        <label>Price</label>
        <input type="text" name="price"><br>
        <label>Quantity</label>
        <input type="text" name="quantity"><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <hr>
    <h2>Output</h2>
    <p>Boook Author : <?php echo $book->getAuthor(); ?></p>
    <p>Book Title : <?php echo $book->getTitle(); ?></p>
    <p>Release date : <?php echo $book->getDate(); ?></p>
    <p>Summary : <?php echo $book->getSummary(); ?></p>
    <p>Price : <?php echo $book->getPrice(); ?></p>
    <p>Quantity : <?php echo $book->getQuantity(); ?></p>
    <p>Total Price : <?php echo $book->getTotalprice(); ?></p>
</body>
</html>