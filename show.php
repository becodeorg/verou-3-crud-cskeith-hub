<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>

<body>
    <ul>
        <li><p>Name: <?= $cardInfo['pokeName'] ?></p></li>
        <li><p>Type: <?= $cardInfo['PokeType'] ?></p></li>
        <li><p>Hp: <?= $cardInfo['hp'] ?></p></li>
        <li><p>Ability: <?= $cardInfo['ability'] ?></p></li>
        <li><p>Attack 1: <?= $cardInfo['attack1'] ?></p></li>
        <li><p>Attack 2: <?= $cardInfo['attack2'] ?></p></li>
        <li><p>Resistance: <?= $cardInfo['resistance'] ?></p></li>
        <li><p>Weakness: <?= $cardInfo['weakness'] ?></p></li><br>
    </ul>
</body>

</html>