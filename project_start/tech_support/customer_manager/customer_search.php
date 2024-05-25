<?php include '../view/header.php'; ?>
<main>
    <h1>Customer Search</h1>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="search_customers_lname">
        <label>Last Name:</label>
        <input type="text" name="lastName" 
               value="<?php echo htmlspecialchars($lastName); ?>">
        <input type="submit" value="Search">
    </form><br>

    <!-- display a table of customers -->
    <h1>Results</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($customers as $customer) : ?>
        <tr>
            <td><?php echo htmlspecialchars($customer['firstName']) . " " . htmlspecialchars($customer['lastName']); ?></td>
            <td><?php echo htmlspecialchars($customer['email']); ?></td>
            <td><?php echo htmlspecialchars($customer['city']); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="show_customer_update">
                <input type="hidden" name="customerID"
                       value="<?php echo htmlspecialchars($customer['customerID']); ?>">
                <input type="submit" value="Select">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php include '../view/footer.php'; ?>