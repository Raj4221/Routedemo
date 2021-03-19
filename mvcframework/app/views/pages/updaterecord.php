<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
foreach ($data['user'] as $user)
{ ?>
<form action="<?php echo URLROOT; ?>/pages/updaterecord" method="POST">

    <input type="hidden" name="id" value="<?php echo $user->id; ?>">

    <label for="name">Name : </label>
    <input type="text" name="name" value="<?php echo $user->name; ?>">
    <br>

    <label for="address">Address : </label>
    <textarea name="address" id="address" cols="30" rows="5"><?php echo $user->address; ?></textarea>
    <br>

    <label for="contact">Contact : </label>
    <input type="text" name="contact" id="contact" value="<?php echo $user->contact; ?>">
    <br>

    <button type="submit" id="submit">Submit</button>

</form>
<?php } ?>
</body>
</html>
