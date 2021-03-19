<?php
/* //This is how you echo out database information on the screen
foreach ($data['user'] as $user) {
echo "Information: " . $user->name .' '. $user->address;
echo "<br>";
}

*/?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Raj Desai</title>
</head>
<body>
    <a href="<?php echo URLROOT; ?>/pages/insertrecord">Add Record</a>
    <table border="2" cellpadding="2">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
            foreach ($data['user'] as $user) {
            //echo "Information: " . $user->name .' '. $user->address;
            ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->address; ?></td>
                <td><?php echo $user->contact; ?></td>
                <td><a href="Pages/deleterecord/<?php echo $user->id; ?>">Delete</a></td>
                <td><a href="Pages/editrecord/<?php echo $user->id; ?>">Update</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
