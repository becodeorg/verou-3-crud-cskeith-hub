<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Pokémon cards</title>
</head>
<body>

<h1>Goodcard - track your collection of Pokémon cards</h1>

<form action="?action=create" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="pokeName" value=""><br>

  <label for="type">Type:</label><br>
  <input type="text" id="type" name="type" value=""><br>

  <label for="hp">Hp:</label><br>
  <input type="text" id="hp" name="hp" value=""><br>

  <label for="ability">Ability:</label><br>
  <input type="text" id="ability" name="ability" value=""><br>

  <label for="attack1">Attack1:</label><br>
  <input type="text" id="attack1" name="attack1" value=""><br>

  <label for="attack2">Attack2:</label><br>
  <input type="text" id="attack2" name="attack2" value=""><br>

  <label for="resistance">Resistance:</label><br>
  <input type="text" id="resistance" name="resistance" value=""><br>

  <label for="weakness">Weakness:</label><br>
  <input type="text" id="weakness" name="weakness" value=""><br>

  <br>
  <input type="submit" name="submit" value="submit">
</form> 


<ul>
    <?php foreach ($cards as $card) : ?>
        <li><?= $card['pokeName'] ?>
            <a href="index.php?action=edit&card_id=<?= $card['id']; ?>">Edit</a>
            <a href="index.php?action=delete&card_id=<?= $card['id']; ?>">Delete</a>
        </li>
        <li><?= $card['type'] ?></li>
        <li><?= $card['hp'] ?></li>
        <li><?= $card['ability'] ?></li>
        <li><?= $card['attack1'] ?></li>
        <li><?= $card['attack2'] ?></li>
        <li><?= $card['resistance'] ?></li>
        <li><?= $card['weakness'] ?></li><br>
    <?php endforeach; ?>
</ul>

</body>
</html>