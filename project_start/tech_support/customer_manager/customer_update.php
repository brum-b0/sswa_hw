<?php include '../view/header.php'; 
#echo '<pre>';
#print_r($customer);
#echo '</pre>';
?>

<main>
    <h1>View/Update Customer</h1>
    <form action="." method="post">
        <input type="hidden" name="action" value="update_customer">
        <input type="hidden" name="customerID" value="<?php echo htmlspecialchars($customer[0]['customerID']); ?>">
        <label>First Name:</label>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($customer[0]['firstName']); ?>"><br>
        <label>Last Name:</label>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($customer[0]['lastName']); ?>"><br>
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($customer[0]['address']); ?>"><br>
        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($customer[0]['city']); ?>"><br>
        <label>State:</label>
        <input type="text" name="state" value="<?php echo htmlspecialchars($customer[0]['state']); ?>"><br>
        <label>Postal Code:</label>
        <input type="text" name="postalCode" value="<?php echo htmlspecialchars($customer[0]['postalCode']); ?>"><br>

        <label>Country:</label>
        <select name="countryCode">
        <?php foreach ($countries as $country) : ?>
        <option value="<?php echo $country['countryCode']; ?>" <?php if ($country['countryCode'] == $customer[0]['countryCode']) echo 'selected'; #pre-select customer's current country from db?>>
            <?php echo $country['countryName']; ?>
        </option>
        <?php endforeach; ?>
        </select><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($customer[0]['phone']); ?>"><br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($customer[0]['email']); ?>"><br>
        <label>Password:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($customer[0]['password']); ?>"><br>
        <label>&nbsp;</label>
        <input type="submit" value="Update Customer"><br>
    </form>
    <br>
    <p><a href="index.php?action=search_customers">Search Customers</a></p>
</main>
<?php include '../view/footer.php'; ?>
