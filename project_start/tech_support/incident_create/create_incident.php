<?php include '../view/header.php'; ?>
<main>
    <h1>Create Incident</h1>
    
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="confirm">
        <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
        <label>Customer:</label>
        <?php echo $customer['firstName'] . ' ' . $customer['lastName'] ?><br>

        <label>Product:</label><!-- product dropdown-->
        <select name="productCode">
        <?php foreach ($products as $product) : ?>
        <option value="<?php echo $product['productCode']; ?>">
            <?php echo $product['name']; ?>
        </option>
        <?php endforeach; ?>
        </select>
        
        <br>
        <label>Title:</label>
        <input type="text" name="title"><br>

        <label>Description:</label>
        <textarea name="description" cols="40" rows="5"></textarea><br>

        
        <label> &nbsp; </label>
        <input type="submit" value="Create Incident" /><br>
    </form>
</main>
<?php include '../view/footer.php'; ?>