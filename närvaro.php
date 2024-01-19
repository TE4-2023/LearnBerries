<!-- Närvarosida -->
<!-- Se till att lägga in absence.sql i din lokala databas -->
<?php
require 'Includes/connect.php';

// Hämta information om lektionen för kursen
$sql = "SELECT * FROM lesson WHERE courseID = :course_ID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":course_ID", $_GET['kursid']);
$stmt->execute();
$lesson = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($lesson);
var_dump($lesson['lessonTimeMin']);

// Hämta eleverna som är med i kursen samt namn på kursen och lektionen
if (isset($_GET['kursid'])) {
    // Hämta elever
    try {
        $sql = "SELECT user_ID FROM course_enrollments WHERE course_ID = :kursID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":kursID", $_GET['kursid']);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Fel uppstod : " . $e->getMessage();
    }

    // Hämta kursnamn
    $sql = "SELECT name.name FROM course INNER JOIN name ON course.name_ID=name.name_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $className = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Skicka in inlagd frånvaro
$insertMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)) {
    // Datan i $_POST sparas som $_POST['time-user_ID'] för varje elev 

    // Loopa genom users och för in datan i databasen för varje elev
    foreach ($users as $key => $user) {
        // Lägg in datan i variabler
        $user_ID = $user['user_ID'];
        $course_ID = $_GET['kursid'];
        $present = null;
        $preRegistered = null;
        $absence = null;

        // Kolla vilken radio button som är ifylld
        switch ($_POST['status-' . $key]) {
            case "present":
                // Sätt true eller false eftersom datatypen i db är bit
                $present = true;
                break;
            case "pre-registered":
                $preRegistered = true;
                break;
            case "absent":
                if (true) {
                }
                $absence = $_POST['time-' . $key];
                break;
        }

        $absenceSetAt = date("Y-m-d h:i");

        try {
            $sql = "INSERT INTO absence (user_ID, course_ID, present, pre_registered, absence, absence_set_at) VALUES (:user_ID, :course_ID, :present, :pre_registered, :absence, :absence_set_at)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user_ID", $user_ID);
            $stmt->bindParam(":course_ID", $course_ID);
            $stmt->bindParam(":present", $present);
            $stmt->bindParam(":pre_registered", $preRegistered);
            $stmt->bindParam(":absence", $absence);
            $stmt->bindParam(":absence_set_at", $absenceSetAt);
            $stmt->execute();

            $insertMessage = "Närvaron lades in";
        } catch (PDOException $e) {
            $insertMessage = "Error : " . $e->getMessage();
        }
    }
}

// Hämtar namnet på en användare genom dess user_ID
function getName($userID, $pdo)
{
    $sql = "SELECT name.name FROM users JOIN name ON users.name_ID = name.name_ID WHERE users.user_ID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":userID", $userID);
    $stmt->execute();
    $name = $stmt->fetch(PDO::FETCH_ASSOC);
    $firstName = $name['name'];

    $sql = "SELECT name.name FROM users JOIN name ON users.lastname_ID = name.name_ID WHERE users.user_ID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":userID", $userID);
    $stmt->execute();
    $name = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastName = $name['name'];

    $name = $firstName . " " . $lastName;

    return $name;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef1241843c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="närvaro.css">
    <title>LearnBerries</title>
    <script>
        // Inaktivera och aktivera inputfältet
        function handleInput(id, action) {
            let input = document.getElementById("time-" + id);
            if (action == "enable") {
                input.disabled = false;
            } else {
                input.disabled = true;
            }
        }
    </script>
</head>

<body>
    <nav>
        <div class="navbar">
            <ul>
                <li><img class="bild" src="logga.png" alt="logga" /></li>
                <li>
                    <h1 class="header">Närvaro</h1>
                </li>

                <div class="left-nav">
                    <li><a href="Includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logga ut</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

    <nav>
        <div class="vert-nav">
            <ul>
                <li class="active"><a href="home.php"><i class="fa-solid fa-house"></i> Hem</a></li>
                <li><a href="kurser.php"><i class="fa-solid fa-scroll"></i> Kurser</a></li>
                <li><a href=""><i class="fa-regular fa-calendar-days"></i> Scheman</a></li>
                <li><a href=""><i class="fa-solid fa-file-pen"></i> Närvaro</a></li>
                <li><a href="nyheter.php"><i class="fa-solid fa-newspaper"></i> Nyheter</a></li>
                <li><a href="kontakter.php"><i class="fa-solid fa-address-book"></i> Kontakter</a></li>
            </ul>
        </div>
    </nav>

    <section class="närvaro-section">
        <?php if (isset($_GET['kursid'])): ?>

            <div class="närvaro-header">
                <!-- Byt till lektion och tid -->
                <h1>Ta närvaro för
                    <?php if (isset($className)) {
                        echo $className['name'];
                    }
                    ?>
                </h1>
            </div>
            <!-- Kolla om kursID är satt i URL:en -->
            <div class="närvaro-content">
                <div class="närvaro-content-header">
                    <h1>Elev</h1>
                    <h1>Närvarande</h1>
                    <h1>Föranmäld</h1>
                    <h1>Frånvaro (min)</h1>
                </div>
                <!-- Visa olika innehåll beroende om kursid är satt i URL:en -->
                <form action="närvaro.php?kursid=<?php echo $_GET['kursid']; ?>" method="POST">
                    <!-- Loopa genom $users och skapa rader för varje elev -->
                    <?php foreach ($users as $key => $user): ?>
                        <div class="user-absence-container">

                            <!-- Namnet -->
                            <label for="">
                                <?php echo getName($user['user_ID'], $pdo); ?>
                            </label>

                            <!-- Radioknappar -->
                            <input type="radio" name="status-<?php echo $key; ?>" value="present" id="pre-registered"
                                onclick="handleInput(<?php echo $key; ?>, 'disable')" checked>

                            <input type="radio" name="status-<?php echo $key; ?>" value="pre-registered" id="pre-registered"
                                onclick="handleInput(<?php echo $key; ?>, 'disable')">

                            <input type="radio" name="status-<?php echo $key; ?>" value="absent" id="pre-registered"
                                onclick="handleInput(<?php echo $key; ?>, 'enable')">

                            <input type="number" name="time-<?php echo $key; ?>" id="time-<?php echo $key; ?>"
                                class="input-field" min="0" max="<?php echo $lesson['lessonTimeMin'] ?>" disabled>
                        </div>
                    <?php endforeach; ?>
                    <input type="submit" value="Skicka in">
                    <!-- Visa meddelande om det finns -->
                    <?php if (isset($insertMessage)): ?>
                        <p class="p-message">
                            <?php echo $insertMessage; ?>
                        </p>
                    <?php endif; ?>
                </form>
                <!-- Visa felmeddelande om inga elever finns -->
            <?php elseif (empty($users) && isset($_GET['kursid'])): ?>
                <h1>Inga elever är tillagda i kursen</h1>
                <!-- Visa felmeddelande om kursid ej finns eller inte är kopplat till befintlig kurs -->
            <?php else: ?>
                <h1>Ingen kurs vald/kursen existerar ej</h1>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>