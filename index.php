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
    ]
];

$filteredHotels = $hotels;
if (isset($_GET['parking']) && $_GET['parking'] == 'on') {
    $filteredHotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'];
    });
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <link rel="stylesheet" href="style.css">
    <title>Hotel List</title>
</head>
<body>
    <header class='container'>
        <h1>Hotels Table</h1>
        <form method="get">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parking" id="parking" value="on" <?php echo isset($_GET['parking']) && $_GET['parking'] == 'on' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="parking">
                    Show hotels with parking only
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </header>
    <div class="container">
        <?php if ($filteredHotels !== null) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Hotel Name</th>
                        <th>Description</th>
                        <th>Parking</th>
                        <th>Vote</th>
                        <th>Distance to Center (km)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filteredHotels as $hotel) { ?>
                        <tr>
                            <td><?php echo $hotel['name']; ?></td>
                            <td><?php echo $hotel['description']; ?></td>
                            <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                            <td><?php echo $hotel['vote']; ?></td>
                            <td><?php echo $hotel['distance_to_center']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-info">
            Errorr
            </div>
        <?php } ?>
    </div>
</body>
</html>
