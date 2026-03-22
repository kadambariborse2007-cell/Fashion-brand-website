<?php
include 'db.php';

$product_id = $_GET['product_id'];
$product = $conn->query("SELECT * FROM products WHERE id=$product_id")->fetch_assoc();

if(isset($_POST['submit'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $conn->query("INSERT INTO orders (product_id, fullname, email, phone, address)
                  VALUES ('$product_id','$name','$email','$phone','$address')");

    echo "<script>alert('Order Placed Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order - GlowTrend</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="order-bg">

<nav>
    <h2>GlowTrend</h2>
</nav>

<h2 style="text-align:center; margin-top:40px;">
<?php echo $product['name']; ?> - ₹<?php echo $product['price']; ?>
</h2>

<form method="POST">
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <textarea name="address" placeholder="Address" required></textarea>
    <button type="submit" name="submit">Confirm Order</button>
</form>

</body>
</html>