<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 11:07 AM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ATM</title>
    <link rel="stylesheet" href="/WBD-PHP/bank/css/style.css">
</head>
<body>
<div id="content">
    <h1>ATM</h1>
    <form action="" method="post">
        <div id="data">
            <label>Account current:</label>
            <input type="text" name="sourceAcc" placeholder="Number account of sender"><br>
            <label>Account receiver: </label>
            <input type="text" name="targetAcc" placeholder="Number account of receiver"><br>
            <label>Amount:</label>
            <input type="text" name="amount" placeholder="Enter amount"><br>
            <label>Content:</label>
            <input type="text" name="content" placeholder="Enter content"><br>
        </div>
        <div id="submit_button">
            <label>&nbsp;</label>
            <input type="submit" value="Submit">
        </div>
</div>
</form>
</body>
