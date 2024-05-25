<?php include '../view/header.php'; ?>
<main>
    <h1>Customer Login</h1>
    <form action="index.php" method="post" id="login_form">
        <input type="hidden" name="action" value="login">
        <label>Email:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($email); ?>">
        <label>&nbsp;</label>
        <input type="submit" value="Login">
        <br>
    </form>
    <?php include '../view/footer.php'; ?>