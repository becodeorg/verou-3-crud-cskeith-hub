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

<a href="index.php?action=create">Add a pokèmon</a>


<ul>
    <?php foreach ($cards as $card) : ?>
        <li><?= $card['pokeName'] ?>
            <a href="index.php?action=show&card_id=<?= $card['id']; ?>">Show Info</a>.
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>