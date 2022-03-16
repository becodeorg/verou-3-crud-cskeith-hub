<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete.php</title>
</head>

<body>
    <form action="index.php?action=delete&card_id=<?= $card_id; ?>" method="post">
        <label for="name">Delete your Pokèmon</label><br>
        <input type="text" id="name" name="name" value=""><br>

        <br>
        <input type="submit" name="submit" value="delete">
    </form>
</body>

</html>