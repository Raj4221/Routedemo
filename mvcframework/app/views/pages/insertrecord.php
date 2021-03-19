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
<form action="<?php echo URLROOT; ?>/pages/insertrecord" method="POST">
    <label for="name">Name : </label>
    <input type="text" name="name">
    <br>

    <label for="address">Address : </label>
    <textarea name="address" id="address" cols="30" rows="5"></textarea>
    <br>

    <label for="contact">Contact : </label>
    <input type="text" name="contact" id="contact">
    <br>

    <button type="submit" id="submit">Submit</button>
</form>
</body>
</html>
