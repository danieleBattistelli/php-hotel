<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

//$filter_parking = isset($_GET['parking']) ? $_GET['parking'] : null;
$filter_parking = $_GET['parking'] ?? null;
//$filter_vote = isset($_GET['vote']) ? $_GET['vote'] : null;
$filter_vote = $_GET['vote'] ?? null;

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Hotel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form method="GET" class="mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parking" id="parking" value="1"
                    <?php echo $filter_parking ? 'checked' : ''; ?>>
                <label class="form-check-label" for="parking">
                    Mostra solo hotel con parcheggio
                </label>
            </div>
            <div class="form-group mt-2">
                <label for="vote">Voto minimo</label>
                <input type="number" class="form-control w-25" name="vote" id="vote" value="
                <?php echo $filter_vote; ?>" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Filtra</button>
        </form>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) {
                    if ($filter_parking && !$hotel['parking']) {
                        continue;
                    }
                    if ($filter_vote && $hotel['vote'] < $filter_vote) {
                        continue;
                    }
                ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>