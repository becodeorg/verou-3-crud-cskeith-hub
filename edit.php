<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pokemon</title>
</head>
<body>
<form action="index.php?action=edit&card_id" method="post">
  <label for="name">Rename your Pokemon:</label><br>
  <input type="text" id="name" name="name" value=""><br>
  <br>
  <input type="submit" name="submit" value="submit">
</form> 
</body>
</html>