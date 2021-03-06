<?php

class Person {
    public function __construct($avatar, $firstName, $lastName, $title, $company, $available, $phone, $email, $website, $street, $propNumber, $orientationNumber, $city) {
        $this->avatar = $avatar;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
        $this->company = $company;
        $this->available = $available;
        $this->phone = $phone;
        $this->email = $email;
        $this->website = $website;
        $this->street = $street;
        $this->propNumber = $propNumber;
        $this->orientationNumber = $orientationNumber;
        $this->city = $city;
    }
    public function getAddress() {
        return $this->street . ' ' . $this->propNumber . '/' . $this->orientationNumber . ', ' . $this->city;
    }

    public function getAvailability() {
        return $this->available ? 'Not available for contracts' : 'Now available for contracts';
    }
}

$people = [];

// remove on of these and the warning goes away
/*array_push($people, new Person(
    'jedi-logo.svg',
    'Anakin',
    'Skywalker',
    'Temple Knight / Architect',
    'First Order Jedi Council',
    false,
    '+420 777 888 542',
    'skywalker@jedi-council.com',
    'www.jedi-council.com',
    'Temple of Eedit',
    42,
    121,
    'Coruscant'
));*/

array_push($people, new Person(
    'jedi-master-logo.svg',
    'Obi-wan',
    'Kenobi',
    'Master Artist / Lector',
    'First Order Jedi Council',
    true,
    '+420 775 456 789',
    'kenobi@jedi-council.com',
    'www.jedi-council.com',
    'Temple of Eedit',
    43,
    121,
    'Coruscant'
));

array_push($people, new Person(
    'galactic-republic-logo.svg',
    'Padmé',
    'Amidala',
    'Senator of Naboo / Queen',
    'the Galactic Senate',
    true,
    '+420 775 456 789',
    'amidala@galactic-senate.com',
    'www.galactic-senate.com',
    'Senate District',
    874,
    12,
    'Naboo'
));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business cards</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
    <header>
        <h1 class="text-center">My Business Card in PHP OOP Style</h1>
    </header>
    <main class="container">
    <?php foreach($people as $person): ?>
        <div class="row">
            <div class="business-card bc-front">
                <div class="col-sm-4">
                    <div class="logo" style="background-image: url(./img/<?php echo $person->avatar; ?>)"></div>
                </div>
                <div class="col-sm-8">
                    <div class="bc-firstname"><?php echo $person->firstName; ?></div>
                    <div class="bc-lastname"><?php echo $person->lastName; ?></div>
                    <div class="bc-title"><?php echo $person->title; ?></div>
                    <div class="bc-company"><?php echo $person->company; ?></div>
                </div>
            </div>
            <div class="business-card bc-back">
                <div class="col-sm-6">
                    <div class="bc-firstname"><?php echo $person->firstName; ?></div>
                    <div class="bc-lastname"><?php echo $person->lastName; ?></div>
                    <div class="bc-title"><?php echo $person->title; ?></div>
                </div>
                <div class="col-sm-6 contacts">
                    <div class="bc-address"><i class="fas fa-map-marker-alt"></i> <?php echo $person->getAddress(); ?></div>
                    <div class="bc-phone"><i class="fas fa-phone"></i> <?php echo $person->phone; ?></div>
                    <div class="bc-email"><i class="fas fa-at"></i> <?php echo $person->email; ?></div>
                    <div class="bc-website"><i class="fas fa-globe"></i> <?php echo $person->website; ?></div>
                    <div class="bc-available"><?php echo $person->getAvailability(); ?></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
    <?php 
        require '../hotreloader.php'; 
        $reloader = new HotReloader();
        $reloader->init();
    ?>
</body>
</html>
