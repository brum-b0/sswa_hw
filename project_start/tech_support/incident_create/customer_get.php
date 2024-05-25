<?php include '../view/header.php'; ?>
<main>
    <h1>Get Customer</h1>
    You must enter the customer's email address to select the customer
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="create_incident"><!-- basically the same as login -->
        <label>Email:</label>
        <input type="text" name="email">
    
        <input type="submit" value="Get Customer" /><br>
    </form>
</main>
<?php include '../view/footer.php'; ?>