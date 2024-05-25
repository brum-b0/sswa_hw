<?php include '../view/header.php'; ?>
<main>
    <h1>Register Product</h1>
    <form action="index.php" method="post" id="register_product_form">
        <input type="hidden" name="action" value="register">
        <label>Customer: <?php echo $customer['firstName'] . " " . $customer['lastName']; ?></label>
        
        <br>
        <label>Product:</label>
        <select name="productCode">
        <?php foreach ($products as $product) : ?>
        <option value="<?php echo $product['productCode']; ?>">
            <?php echo $product['name']; ?>
        </option>
        <?php endforeach; ?>
        </select>
        <br>
        <label>&nbsp;</label>
        <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
        <input type="submit" value="Register Product">
        <br>
    </form>
    <label> You are logged in as <?php echo $_SESSION['email']; #verify they are logged in?></label>

    <form action="index.php" method="post" id="logout"><!--logout button-->
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>
</main>
<?php include '../view/footer.php'; ?>