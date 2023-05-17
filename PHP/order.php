<?php

$pid = $_GET["pid"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/variable.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/order.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>ORDER</title>
</head>
<body>

<div class="right-section">

<h4>CONFIRM ORDER</h4>
    <form action="confirmOrder.php" method="POST">
        <div class="input-group">
            <input type="text" id="name" required>
            <label for="name">Name</label>
        </div>
        <div class="input-group">
            <input type="text" id="mobile" required>
            <label for="mobile">Mobile</label>
        </div>
        <div class="input-group">
        <textarea id="address" name="address" rows="4" cols="50" placeholder="Address"></textarea>
        
        </div>
        <input type="hidden" id="pid" id="pid" value="<?php echo $pid; ?>">

        <div class="submit-section">
            <input type="submit" id="btn" class="submit-button" value="PLACE ORDER"/>
        </div>

    </form>
</div>

<script src="../Script/order.js"></script>

</body>
</html>