<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Products - GlowTrend</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="products-bg">

<nav>
    <h2>GlowTrend</h2>
    <div>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="#">Order</a>
    </div>
</nav>

<div class="products">
<?php
$result = $conn->query("SELECT * FROM products");
while($row = $result->fetch_assoc()) {
?>
    <div class="card">
        <img src="images/<?php echo $row['image']; ?>">
        <h3><?php echo $row['name']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <h4>₹ <?php echo $row['price']; ?></h4>
        <a href="order.php?product_id=<?php echo $row['id']; ?>">
            <button>Buy Now</button>
        </a>
    </div>
<?php } ?>
</div>

</body>
</html>